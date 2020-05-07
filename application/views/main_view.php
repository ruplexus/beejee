<!DOCTYPE html>
<html>
    
    <head>
	
		<title>Список задач</title>
	
		<meta charset="utf-8">
		
		<link href="//code.ruplex.net/ruplex/versions/v1.1/css/ruplex.css" rel="stylesheet" type="text/css"/>
		
		<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
		<link href="https://bootstraptema.ru/snippets/element/2020/bootstrap-table.css" rel="stylesheet" />
		<link href="/css/styles.css" rel="stylesheet" />

		<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
		<script src="//code.ruplex.net/ruplex/versions/v1.1/js/ruplex.js" type="text/javascript"></script>
		<script type="text/javascript" src="http://bootstraptema.ru/plugins/2015/b-v3-3-6/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://bootstraptema.ru/snippets/element/2020/bootstrap-table.js"></script>
		<script type="text/javascript" src="/js/main.js"></script>
		
    </head>
    
    <body>
		
		<main>
			<section class="auth_form">

				<div class="wrapper">
				 <div class="container">
				 <div class="row">
				 <div class="col-md-8 col-md-offset-2">

				 <div class="fresh-table toolbar-color-blue">

					<div class="toolbar">

						<?if($data['IS_AUTH']):?>
						<a href="#" id="close_session_user" class="btn btn-default">Выйти</a>
						<?else:?>
						<a href="/auth/" class="btn btn-default">Авторизоваться</a>
						<?endif;?>

						<a href="#" id="add_task" target="_blank" class="btn btn-default add_task">Добавить новую задачу</a>
					</div>


				 <table id="fresh-table" class="table">

					<thead>

						<th data-field="id" data-sortable="true">ID</th>
						<th data-field="name" data-sortable="true">Имя пользователя</th>
						<th data-field="email" data-sortable="true">E-mail</th>
						<th data-field="task_text" data-sortable="true">Текст задачи</th>
						<th data-field="status" data-sortable="true">Статус</th>

						<?if($data['IS_AUTH']):?>
						<th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Действия</th>
						<?endif;?>

					</thead>

					<tbody>

						<?foreach($data['LIST'] as $row):?>
						<tr data-task-id="<?=$row['ID']?>">

							<td data-name="ID"><?=$row['ID']?></td>
							<td data-name="NAME"><?=$row['NAME']?></td>
							<td data-name="EMAIL"><?=$row['EMAIL']?></td>
							<td data-name="TEXT"><?=$row['TEXT']?></td>
							<td data-name="STATUS"><?=$row['STATUS']?></td>

							<?if($data['IS_AUTH']):?>
							<td></td>
							<?endif;?>

						</tr>
						<?endforeach;?>

					</tbody>

				 </table>
				 </div>


				 </div>
				 </div>
				 </div>
				</div>

				 <script>

					 function actionEditRow(){

						$('.table-action.edit').unbind();

						$('.table-action.edit').click(function(){

							actionOpenModalEdit($(this).attr('data-row-index'), $(this).attr('data-row-id'));

							actionEditRow();

						});

					}

					function actionDeleteRow(){

						$('.table-action.remove').unbind();

						$('.table-action.remove').click(function(){

							$table.bootstrapTable('remove', { field: 'id', values: [$(this).attr('data-row-id')] });

							actionDeleteTask($(this).attr('data-row-id'));

							actionDeleteRow();

						});

					}

				 var $table = $('#fresh-table'),
				 full_screen = false;

				 $().ready(function(){

				 $table.bootstrapTable({
				 toolbar: ".toolbar",
				 search: true,
				 showColumns: true,
				 pagination: true,
				 striped: true,
				 pageSize: 25,
				 pageList: [8,10,25,50,100],

				 formatShowingRows: function(pageFrom, pageTo, totalRows){
				 },
				 formatRecordsPerPage: function(pageNumber){
				 return pageNumber + " задач отображено на странице";
				 },
				 icons: {
				 refresh: 'fa fa-refresh',
				 toggle: 'fa fa-th-list',
				 columns: 'fa fa-columns',
				 detailOpen: 'fa fa-plus-circle',
				 detailClose: 'fa fa-minus-circle'
				 }
				 });

				 $('.pull-right.search > input').attr('placeholder', 'Найти');

				 $(window).resize(function () {
				 $table.bootstrapTable('resetView');
				 });

				 });

					function operateFormatter(value, row, index) {
						return [
						'<a rel="tooltip" title="Edit" class="table-action edit" data-row-id="'+ row.id +'" data-row-index="'+ index +'" href="javascript:void(0)" title="Edit">',
						'<i class="fa fa-edit"></i>',
						'</a>',
						'<a rel="tooltip" title="Remove" class="table-action remove" data-row-id="'+ row.id +'" href="javascript:void(0)" title="Remove">',
						'<i class="fa fa-remove"></i>',
						'</a>'
						].join('');
					}

					setInterval(function(){

						actionDeleteRow();

						actionEditRow();

					}, 500);

				 </script>
				 
			</section>
		</main>
		
	</body>

</html>