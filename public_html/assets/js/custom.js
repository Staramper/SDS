
let $campo1, $campo2, $campo3, $campo4, $campo5, $campo6, $campo7;

// Document Ready
$(function ()
{
    // Validar Login
    $campo1 = $('#email');
    $campo1.change(() => {
        validarLog()
    });
    $campo1.keyup(() => {
        validarLog()
    });

    $campo2 = $('#password');
    $campo2.change(() => {
        validarLog()
    });
    $campo2.keyup(() => {
        validarLog()
    });

    validarLog()

    // Validar Register
    $campo3 = $('#name');
    $campo3.change(() => {
        validarReg()
    });
    $campo3.keyup(() => {
        validarReg()
    });

    $campo4 = $('#email2');
    $campo4.change(() => {
        validarReg()
    });
    $campo4.keyup(() => {
        validarReg()
    });

    $campo5 = $('#key');
    $campo5.change(() => {
        validarReg()
    });
    $campo5.keyup(() => {
        validarReg()
    });

    $campo6 = $('#password2');
    $campo6.change(() => {
        validarReg()
    });
    $campo6.keyup(() => {
        validarReg()
    });

    $campo7 = $('#password-confirm');
    $campo7.change(() => {
        validarReg()
    });
    $campo7.keyup(() => {
        validarReg()
    });

    validarReg()

});

function validarLog() {
    try{
        if ( $campo1.val().length > 0 && $campo2.val().length > 0 ) {
            $("#btn").prop('disabled', false);
        } else {
            $("#btn").prop('disabled', true);
        }
    }catch{}
};

function validarReg() {
    try{
        if ( $campo3.val().length > 0 && $campo4.val().length > 0 && $campo5.val().length > 0 && $campo6.val().length > 0 && $campo7.val().length > 0 ) {
            $("#btn2").prop('disabled', false);
        } else {
            $("#btn2").prop('disabled', true);
        }
    }catch{}
};