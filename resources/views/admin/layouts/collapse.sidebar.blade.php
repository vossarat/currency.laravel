<div class="col-sm-3 col-md-2 sidebar">
	<ul class="nav nav-sidebar">
		<li><a href="#">Dashboard</a></li>
		<li><a href="{{ route('users') }}">Users</a></li>
		<li><a href="{{ url('/admin/menus') }}">Menus</a></li>
		<li><a href="#">Link1</a></li>
		<li><a href="#">Link2</a></li>
	</ul>

	<div class="panel-group">


		<div class="panel panel-default nav nav-sidebar">


			<div class="panel-heading panel-title">
				<a data-toggle="collapse" href="#collapse1">List_1</a>
			</div>

			<div id="collapse1" class="panel-collapse collapse">
				<ul class="list-group">


					<div class="panel-heading panel-title list-group-item">
						<a data-toggle="collapse" href="#collapse2">One.1</a>
					</div>

					<div id="collapse2" class="panel-collapse collapse">
						<ul class="list-group">
							<li class="list-group-item">One.1.1</li>
							<li class="list-group-item">One.1.2</li>
							<li class="list-group-item">One.1.3</li>
						</ul>
					</div>

			
					<div class="panel-heading panel-title list-group-item">
						<a data-toggle="collapse" href="#collapse3">Two.1</a>
					</div>

					<div id="collapse3" class="panel-collapse collapse">
						<ul class="list-group">
							<li class="list-group-item">Two.1.1</li>
							<li class="list-group-item">Two.1.2</li>
							<li class="list-group-item">Two.1.3</li>
						</ul>
					</div>
					
					
					
					<li class="list-group-item"><a href="#">Three</a></li>
				</ul>
			</div>


		</div>


	</div>


</div>
{{--
<div class="panel-group" id="accordion">
	<!-- здесь будет находиться код для свертывания -->
	<!-- Свертывания #1 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
					Пункт Группы Свертывания #1
				</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse">
			<div class="panel-body">
				Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			</div>
		</div>
	</div>
	<!-- конец кода для свертывания -->
</div>--}}