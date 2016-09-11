        function validar_campo_numerico(id){
            var campo = $("#"+id).val();
            if (!($.isNumeric(campo))){
                    alert("El campo "+id+" contiene una letra, sólo números.");
                    $("#"+id).val("");
                    return false;
                }
            return true;
        }

        function validar_campo_string(id) {
            var campo = $("#"+id).val();
            if (!(/^[a-zA-Z()]+$/.test(campo))){
                alert("Tiene caracteres inválidos en: \n"+id);
                return false;
            }
          return true;
        }

        function validar_correo(id){
            var campo = $("#"+id).val();
            for (var i=0; i< campo.length; i++){
                if (campo[i] == '@'){
                    var extension = campo.substr(i+1,campo.length);
                    switch(extension){
                        case 'hotmail.com':
                            return true;
                        case 'gmail.com':
                            return true;
                        case 'outlook.com':
                            return true;
                    }
                    $("#"+id).val("");
                    alert('Introduzca una extensión de correo válida (@hotmail.com, @outlook.com, @gmail.com).');
                }
                if (i == campo.length){
                    $("#"+id).val("");
                    alert('El correo debe contener @');
                }
            }
            return false;
        }


        function validar_espacios_vacios(lista){
            for (var i = 0; i < lista.length; i++){
                var campo = lista[i];
                if (campo.length > 0){
                    for (var j = 0; j < campo.length; j++){
                        if (campo[j] == " "){
                            alert("Existen espacios vacios: \n"+campo);
                            return false;
                        }
                    }
                }
                else{
                    alert("Existen campos vacíos");
                    return false;
                }
            }
            return true;
        }

        function validar_extension(imagen){
            var ext=['gif','jpg','jpeg','png'];
            var v=imagen.value.split('.').pop().toLowerCase();
            for(var i=0,n;n=ext[i];i++){
                if(n.toLowerCase()==v)
                    return
            }
            var t=imagen.cloneNode(true);
            t.value='';
            imagen.parentNode.replaceChild(t,imagen);
            alert('extensión no válida');
        }


        function validar_caracteres_especiales(id) {
            var campo = $("#"+id).val();
            var characterReg = /[`~!@#$%^&*()_°¬|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;

            if (characterReg.test(campo)) {
                alert("caracteres especiales presentes")
                $("#"+id).val(campo.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, ''));
            }
        }