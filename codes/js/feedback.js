$(function(){
  $('#feedbackModal').on('show.bs.modal', function(event){
    var modal = $(this);
    var button = $(event.relatedTarget)
    modal.find('#feedbackForm').get(0).reset()
    modal.find('#ageGroup').removeClass('has-error');
    modal.find('#ageHelpBlock').addClass('hidden');
  });
  $('#sendFeedback').on('click', function(event){
    var modal = $('#feedbackModal');
    var age = modal.find('#ageInput').val();
    if(age >= 18){
      modal.modal('hide');
      modal.find('#feedbackForm').submit()
    } else {
      modal.find('#ageGroup').addClass('has-error');
      modal.find('#ageHelpBlock').removeClass('hidden');
    }
  });
});
