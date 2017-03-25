@extends('admin.layouts.template')

@section('content')

<h1 class="page-header">Загрузка файлов</h1>

<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">

		<div class="panel-heading">
			Выбор файла
			<a href="{{ route('adminpanel') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> {{-- х закрыть --}}
		</div>

		<div class="panel-body">

			<form enctype="multipart/form-data" id="upload_form" role="form" method="POST" action="" >
				{{ csrf_field() }}

				<div class="form-group">
					<div class="row contentpane">
						<div class="col-xs-10 col-xs-offset-1">
							@foreach (collect($urlFiles)->chunk(3) as $chunk)
								<div class="row">
									@foreach ($chunk as $file)
										<div class="col-xs-4">
											<div class="thumbnail">
												<a href=""><img src="/storage/logotips/{{ $file }}"></a>
											</div>
										</div>
									@endforeach
								</div>
							@endforeach
						</div>
					</div>
				</div>
				
		
				<div class="form-group">
					<label for="url" class="col-xs-4 control-label">Url логотипа</label>
					<div class="col-xs-6">
						<input id="url" type="text" class="form-control">
					</div>
				</div>
								
				<div class="form-group">
						<div class="col-xs-4">
							<input name="logotip" type="file"/>
						</div>
						<div class="col-xs-8">
							<button class="btn btn-success" type="button">Загрузить</button>
						</div>
				</div>
				
			</form>

		</div>
	</div>
</div>

@push('scripts')
<script>
	$(document).ready(function(){
		
	
			$('.thumbnail > a').on('click', function() {			
					$('#url').val($(this).children('img').attr("src")) ;
					return false;
				});
				
			$(".btn.btn-success").click(function()
				{
					$.ajax(
						{
							url:'/admin/send',
							data:new FormData($("#upload_form")[0]),
							dataType:'html',
							type:'post',
							processData: false,
							contentType: false,
							success:function(response)
							{
								$('.contentpane').html( response );
							},
							error: function ( jqXHR, textStatus, errorThrown )
							{
								console.log( 'error = ' + errorThrown );
							},
						});
				});				
			
			
		});
		
</script>
@endpush

@endsection