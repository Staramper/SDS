//ALERTAS SWEEAT ALERT
export function correcto(){
    Swal.fire({
      position: 'center',
      type: 'success',
      title: 'Everything Correct, Good job!',
      showConfirmButton: false,
      timer: 1500
    })
      };

  export function error(){
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Something went wrong, we are sorry.',
      })
      };
