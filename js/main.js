function htmlspecialchars(text) {
  return text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
}

function actionOpenModalAdd(){
	
	r.popup_text_content({

		content: '\
<div class="row">\n\
<input type="text" id="form_add_task_name" placeholder="Введите имя">\n\
</div>\n\
<div class="row">\n\
<input type="text" id="form_add_task_email" placeholder="Введите email">\n\
</div>\n\
<div class="row">\n\
<textarea id="form_add_task_text" placeholder="Введите текст задачи"></textarea>\n\
</div>\n\
<div class="row">\n\
<select id="form_add_task_status">\n\
<option value="В работе">В работе</option>\n\
<option value="Завершена">Завершена</option>\n\
</select>\n\
</div>\n\
<div class="row">\n\
<button id="form_add_task_submit">Добавить</button>\n\
</div>\n\
\n\
',

		title: 'Добавить новую задачу',
		scroll: 'false',
		class: 'order_callback',
		width: 770,
		close_id: 'rp_callback'

	});
	
	$('#form_add_task_submit').click(function(e){
		
		e.preventDefault();
		
		fields = r.check_fields({

			form_add_task_name: {

				type: 'text',
				min_length: 1,
				error_text: 'Введено недопустимое количество символов!'

			},

			form_add_task_email: {

				type: 'email',
				min_length: 1,
				error_text: 'Введено недопустимое количество символов!'

			}

		});

		if(fields.error === true){
			return false;			
		}
		
		$.post('', {
			
			form_add_task: 'isset',
			
			form_add_task_name: $('#form_add_task_name').val(),
			form_add_task_email: $('#form_add_task_email').val(),
			form_add_task_text: $('#form_add_task_text').val(),
			form_add_task_status: $('#form_add_task_status').val(),
			
		}, function(data){
			
			if(data){
				
				alert('Задача успешно была добавлена. Страница будет перезагружена.');
				
				location.href = '/';
				
			} else {
				alert('Возникли проблемы при добавлении.');
			}
		
		});
		
		return false;
		
	});
	
}

function actionOpenModalEdit(index, task_id){
	
	taks_tr = $('tr[data-task-id="' + task_id + '"]');
	
	task_data = {
		
		NAME: taks_tr.find('td[data-name="NAME"]').text(),
		EMAIL: taks_tr.find('td[data-name="EMAIL"]').text(),
		TEXT: taks_tr.find('td[data-name="TEXT"]').text(),
		STATUS: taks_tr.find('td[data-name="STATUS"]').text()
		
	};
	
	r.popup_text_content({

		content: '\
<div class="row">\n\
<input type="text" id="form_edit_task_name" placeholder="Введите имя" value="' + task_data.NAME + '">\n\
</div>\n\
<div class="row">\n\
<input type="text" id="form_edit_task_email" placeholder="Введите email" value="' + task_data.EMAIL + '">\n\
</div>\n\
<div class="row">\n\
<textarea id="form_edit_task_text" placeholder="Введите текст задачи">' + task_data.TEXT + '</textarea>\n\
</div>\n\
<div class="row">\n\
<select id="form_edit_task_status">\n\
<option value="В работе">В работе</option>\n\
<option value="Завершена">Завершена</option>\n\
</select>\n\
</div>\n\
<div class="row">\n\
<button id="form_edit_task_submit">Изменить</button>\n\
</div>\n\
\n\
',

		title: 'Редактировать задачу #' + task_id,
		scroll: 'false',
		class: 'order_callback',
		width: 770,
		close_id: 'rp_callback'

	});
	
	// устанавливаем статус в форму
	$('#form_edit_task_status').val(task_data.STATUS);
	
	$('#form_edit_task_submit').click(function(){
	
		fields = r.check_fields({

			form_edit_task_name: {

				type: 'text',
				min_length: 1,
				error_text: 'Введено недопустимое количество символов!'

			},

			form_edit_task_email: {

				type: 'email',
				min_length: 1,
				error_text: 'Введено недопустимое количество символов!'

			}

		});

		if(fields.error === true){
			return false;			
		}
		
		$.post('', {
			
			form_edit_task: 'isset',
			
			form_edit_task_task_id: task_id,
			form_edit_task_name: $('#form_edit_task_name').val(),
			form_edit_task_email: $('#form_edit_task_email').val(),
			form_edit_task_text: $('#form_edit_task_text').val(),
			form_edit_task_status: $('#form_edit_task_status').val(),
			
		}, function(data){
			if(data == '0'){
				
				alert('Отредактировать задачу не удалось. Сервер вернул ошибку.');
				
				location.href = '/';
				
			}
		});
		
		// вносим изменения в существующую строку
		taks_tr.find('td[data-name="NAME"]').html($('#form_edit_task_name').val());
		taks_tr.find('td[data-name="EMAIL"]').html($('#form_edit_task_email').val());
		taks_tr.find('td[data-name="TEXT"]').html(htmlspecialchars($('#form_edit_task_text').val()));
		taks_tr.find('td[data-name="STATUS"]').html($('#form_edit_task_status').val());
		
		$('[data-ruplex-id="rp_callback"]').click();
		
	});
	
}

function actionDeleteTask(task_id){
	$.post('', { delete_task: 'isset', delete_task_id: task_id }, function(data){
		
		if(data == '0'){
			
			alert('Удалить задачу не удалось. Сервер вернул ошибку.');
			
			location.href = '/';
			
		}
		
	});
}

$(document).ready(function(){
	
	$('#close_session_user').click(function(event){
		
		event.preventDefault();
		
		$.post('', { closed_session: 'isset' }, function(){
			location.href = '';
		});
		
		return false;
		
	});
	
	$('#add_task').click(function(event){
		
		event.preventDefault();
		
		actionOpenModalAdd();
		
		return false;
		
	});
	
});