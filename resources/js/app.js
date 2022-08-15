require('./bootstrap');

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$(function () {
  $(".chosen-select").chosen();
})

$(document).ready(function () {
  $(document).on('submit', '[name="search-form"]', function (e) {
      e.preventDefault();
      var form = document.querySelector('[name="search-form"]');
      var data = new FormData(form);

      if (!data.get('search')) {
            var search = document.querySelector('[name="search"]');
            search.setAttribute('placeholder', 'Введите ключевое слово для поиска');
      } else {
        $('.spinner-border-sm').removeClass('d-none');
        $('.fa-search').addClass('d-none');
        $('.search').prop('disabled', true);
        axios.post(form.action, data)
        .then(function (response) {
            $('#search-result').html(response.data.html);
            $('.spinner-border-sm').addClass('d-none');
            $('.fa-search').removeClass('d-none');
            $('.search').prop('disabled', false);
        })
        .catch(function (error) {
          $('.toast-header').addClass('bg-danger');
          $('.toast-header').removeClass('bg-success');
          $('.toast-body').html('Что-то пошло не так. Попробуйте ещё раз или сообщите нам');
          $('.toast').toast('show');
        });
      }
  });
});
