<div class="modal fade" id="logo_browse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Выбор логотипа</h4>
				<div class="form-group">
					<div class="col-xs-4">
						<input name="logotip" type="file"/>
					</div>
					<div class="col-xs-8">
						<button class="btn btn-success" type="button">Загрузить</button>
					</div>
				</div>

			</div>
			
			<div class="modal-body logo-select">
				@include('admin.user.logoselect')
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
			</div>
			
		</div>
	</div>
</div>

@push('scripts')
<script>
	$(document).ready(function()
		{
			
			function basename( path )
					{
					  parts = path.split( '/' );
					  return parts[parts.length-1];
					};
			
			$(document).on('click','.thumbnail>a',function(e){
					
					var path = $(this).children('img').attr("src"); 
					$('#logo_browse').modal('hide')
					$('.logotip-show').children('img').attr("src", path);					
					$('#image').val( basename( path ) );	
				});
			
			var logotip;
			$('input[type=file]').change(function()
				{
					logotip = this.files[0];
				});
			
			$('.btn.btn-success').on( 'click', function()
				{
					var formData = new FormData();
					formData.append('_token', "{{ csrf_token() }}");
					formData.append('logotip', logotip);

					$.ajax(
						{
							url:'/admin/send',
							data:formData,
							dataType:'html',
							type:'post',
							processData: false,
							contentType: false,
							success:function(response)
							{
								$('.logo-select').html( response );
							},
							error: function ( jqXHR, textStatus, errorThrown )
							{
								console.log( 'error = ' + errorThrown );
							},
						});
				} );


		});

</script>
@endpush