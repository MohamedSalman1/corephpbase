$(function(){
    
    $('#signUpForm').on('submit', function(){
        $.ajax({
            type: 'POST',
            url: 'process.php',
            data: $('#signUpForm').serialize(),
            dataType: "json",
            beforeSend: function(){
                $('.js-submit-btn').prop('disabled', true);
                $('.js-flash-error, .js-flash-success').empty().addClass('d-none');
            },
            success: function(result){
                $('.js-submit-btn').prop('disabled', false);
                if (result.status === "invalid" || result.status === "error") {
                    $('.js-flash-error').html(result.message).removeClass('d-none');
                }
                if (result.status === "success") {
                    $('.js-field-name, .js-field-email, .js-field-pwd').val('');
                    $('.js-field-token').val(result.token);
                    $('.js-flash-success').html(result.message).removeClass('d-none');
                }
            },
            error: function(){
                $('.js-submit-btn').prop('disabled', false);
            }
        });
        return false;
    });
    
});