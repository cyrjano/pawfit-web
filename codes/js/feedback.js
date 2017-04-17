$(function(){
  $('#feedbackModal').on('show.bs.modal', function(){
    var modal = $(this);
    modal.find('#nameInput').val('');
    modal.find('#ageInput').val('');
    modal.find('#feedbackTextarea').val('');
    modal.find('#ageGroup').removeClass('has-error');
    modal.find('#ageHelpBlock').addClass('hidden');
  });
  $('#sendFeedback').on('click', function(event){
    var modal = $('#feedbackModal');
    var age = modal.find('#ageInput').val();
    if(age >= 18){

      modal.modal('hide');
    } else {
      modal.find('#ageGroup').addClass('has-error');
      modal.find('#ageHelpBlock').removeClass('hidden');
    }
  });
});
