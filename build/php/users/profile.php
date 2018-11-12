<html>
<head>
    <title>Inicio</title>
    <?php
        include '../modules/nav.php';   
    ?>
</head>
<body>
    <section id="profile-section" class="profile-section">
    </section>
    <span id="configuration" class="configuration-outer-container">
        <span class="configuration-inner-container">
            <span class="configuration">
                <span class="configuration-title">Configuración</span>
                <span class="inputs-container">
                    <input type="text" id="config-names" placeholder="Nombres">
                    <input type="text" id="config-lastnames" placeholder="Apellidos">
                    <input type="text" id="config-email" placeholder="Correo">
                    <input type="date" id="config-date">
                    <select id="config-gender">
                        <option value="" selected disabled hidden>Género</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                        <option value="Otro">Otro</option>
                    </select>

                    <select id="config-country">
                        <option value="" selected disabled hidden>País</option>
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia, Plurinational State of</option>
                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Côte d'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curaçao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                    <input type="password" id="config-old-pass" placeholder="Contraseña antigua">
                    <input type="password" id="config-new-pass" placeholder="Nueva contraseña">
                    <input type="password" id="config-repeat-pass" placeholder="Repetir contraseña">
                </span>
                <span class="options">
                    <a class="configuration-cancel btn-floating"><i class="far fa-times-circle"></i></a>
                    <a class="configuration-accept btn-floating"><i class="far fa-check-circle"></i></a>
                </span>
            </span>
        </span>
    </span>
</body>

<script>
    var ActualUrl;
    var profile;
    function formatBirthday(date){
        if(date != undefined){
            var splittedDate = date.split("-");
            return `${splittedDate[2]} de ${months[parseInt(splittedDate[1]) - 1]}`;            
        }
        else return "";
    }

    function generateGroupCard(id, name, images){
        rows = '';
        rows += (images.length == 0)? `<span id="${id}" class="group-card empty">` : `<span id="${id}" class="group-card">`;
        for(i in images){
            if(i == 0){
                rows += `<img class="image top-left" src="${images[i]}">`;
            }else if(i == 1){
                rows += `<img class="image top-right" src="${images[i]}">`;
            }else if(i == 2){
                rows += `<img class="image bottom-left" src="${images[i]}">`;
            }else if(i == 3){
                rows += `<img class="image bottom-right" src="${images[i]}">`;
            }
        }
        rows += '<span class="information">';
        rows += '<span class="name flexFont">';
        rows += name;
        rows += '</span>';
        rows += '</span>';
        rows += '</span>';
        $('.groups-container').append(rows);
        flexFont();
    }

    //Función para generar los perfiles de los usuarios, recibe [type] que es el tipo de usuario (0 si es el usuario actual y 1 si es cualquier otro usuario), [username] que es el nombre de usuario, [name] que es un arreglo con los nombres y apellidos (['nombre', 'nombre', 'apellido', 'apellido']), [birthday] que es el cumpleaños (como 27 de marzo), [gender] que es el género, [country] que es el país, [image] que es el path de la imagen del usuario, [following] booleano que indica si se está siguiendo (debe ser false si es el perfil del usuario actual) y [callback] que es una función que se ejecuta al finalizar la generación del perfil (En el callback podes llamar a los métodos de generación de tarjetas).
    function generateUserProfile(type, correo, username, name, lastname, birthday, gender, country, image, groupsIds, groupsNames, following, wishes, callback){
        if(country == undefined) country = "";
        birthdayUser = birthday;
        birthday = formatBirthday(obj[0].fecha_nacimiento)
        rows = '';
        rows += `<span class="central-container">`;
        rows += (following)? `<span class="profile-title following">` : `<span class="profile-title">`;
        rows += '<span id="wishlist-container" class="wishlist-container">';
        rows += '<span class="wishlist-title"><i class="fas fa-gift"></i> Lista de Deseos</span>';
        rows += '<span id="wishlist" class="wishlist">';
        if(wishes.length > 0){
            rows += '<span class="wishes">';
            for(i in wishes){
                rows += (type == 0)? `<span wish-id="${wishes[i].deseo_id}" class="wish">${wishes[i].nombre} <a class="wish-delete"><i class="fas fa-times"></i></a></span>` : `<span wish-id="${wishes[i].deseo_id}" class="wish">${wishes[i].nombre}</span>`;
            }
            rows += '</span>';
        }else{
            rows += (type == 0)? `<span class="no-wishes"><i class="fas fa-box-open"></i> No tienes deseos</span>` : `<span class="no-wishes"><i class="fas fa-box-open"></i> Este usuario no tiene deseos</span>`;
        }
        rows += '</span>';
        rows += '</span>';
        if(type == 0){
            rows += '<span class="wide-central-container wish-creation-input-container">';
            rows += '<span class="wish-creation-input">';
            rows += '<input class="wish-creation" type="text" placeholder="Nuevo deseo">';
            rows += '</span>';
            rows += '</span>';
        }
        rows += '<span class="title-bg-container">';
        rows += `<img class="title-bg" src="${image}">`;
        rows += '</span>';
        //#user-image-file es el input con la imagen.
        rows += (type == 0)? `<span class="profile-img flex-image me"><input type="file" onchange="(readImg(this));" id="user-image-file">` : `<span class="profile-img flex-image">`;
        rows += `<img src="${image}">`;
        rows += `<span class="img-update"><i class="far fa-caret-square-up"></i> Subir imagen</span>`;
        rows += `</span>`;
        rows += `<span class="name-container">`;
        rows += `<span id="lastnames" class="user-lastnames">`;
        rows += `${lastname}`;
        rows += `</span>`;
        rows += `<span id="names" class="user-names">`;
        rows += `${name}`;
        rows += `</span>`;
        rows += `<span class="user-alias">`;
        rows += `<b>@</b>${username}`;
        rows += `</span>`;
        rows += `<span class="button-section">`;
        if(type == 1){
            if(following){
                rows += `<a class="follow btn-login"><i class="fas fa-check-circle"></i> Siguiendo</a>`;
                rows += `<a class="relative btn-login solid"><i class="fas fa-plus"></i>Familiar</a>`;
            }else{
                rows += `<a class="follow btn-login">Seguir</a>`
            }
        }else if(type == 0){
            rows += `<a id="profile-config" class="config btn-login"><i class="fas fa-cog"></i> Configuración</a>`;
        }
        rows += `</span>`;
        rows += `</span>`;
        rows += `</span>`;
        rows += `<span class="profile-information-container">`;
        rows += `<span class="profile-information">`;
        rows += `<span id="btn-wishlist" class="btn-wishlist"><i class="fas fa-gift"></i></span>`;
        rows += `<span class="info-title">Información</span>`;
        rows += `<span id="birthday" class="birthday"><span class="icon"><i class="fas fa-birthday-cake"></i></span> ${birthday}</span>`;
        rows += `<span id="gender" class="gender"><span class="icon"><i class="fas fa-mars"></i></span> ${gender}</span>`;
        rows += `<span id="country" class="country"><span class="icon"><i class="fas fa-globe-americas"></i></span> ${country}</span>`;
        rows += `</span>`;
        switch(type){
            //Usuario que inició sesión.
            case 0:
                rows += `<span class="family-information">`;
                rows += `<span class="info-title relatives">Grupos</span>`;
                for(i in groupsIds){
                    rows += `<span group-id="${groupsIds[i]}" class="users-container">`;
                    rows += `<span class="users-lastname">${groupsNames[i]}</span>`;
                    rows += `</span>`;
                }
                //rows += `<span class="info-title friends">Amigos</span>`;
                rows += `<span class="users-container">`;
                rows += `</span>`;
                break;
            //Cualquier otro usuario.
            case 1:
                rows += `<span class="family-information">`;
                rows += `<span class="info-title relatives">Grupos en común</span>`;
                for(i in groupsIds){
                    rows += `<span group-id="${groupsIds[i]}" class="users-container">`;
                    rows += `<span class="users-lastname">${groupsNames[i]}</span>`;
                    rows += `</span>`;
                }
                //rows += `<span class="info-title friends">Amigos</span>`;
                rows += `<span class="users-container">`;
                rows += `</span>`;
                break;
                // rows += `<span class="groups-information">`;
                // rows += `<span class="info-title">Grupos en Común</span>`;
                // rows += `<span class="groups-container">`;
                // rows += `</span>`;
                // rows += `</span>`;
                // break;
            rows += `</span>`;
        }
        rows += `</span>`;
        rows += `</span>`;
        
        $('.profile-section').html(rows);
        
        if(type == 1){
            $('.button-section').find('.follow').click((event)=>{
                if($('.profile-title').hasClass('following')){
                    follow(false);
                }else{
                    follow(true);
                }
            });
        }else if(type == 0){
            $('.img-update').click((event)=>{
                var element = $(event.currentTarget);
                $('#user-image-file').click();
            });
        }
        object = $('#profile-section').find('.central-container').find('.profile-title').find('.flex-image').find('img');
        object[0].onload = (event)=>{
            flexImage(event.target);
        }
        //flexImage($('#profile-section').find('.central-container').find('.profile-title').find('.flex-image'));
        setTimeout(() => {
            callback();
            $('.profile-title').css('opacity', '1');
            $('.title-bg').css('opacity', '1');
            $('.title-bg').css('transform', 'scale(1.2)');
            $('.profile-information-container').css('opacity', '1');

            if(type == 0){
                $('#profile-config').click((event)=>{
                    object = $('#configuration');
                    object.find('#config-names').val($('#names').text());
                    object.find('#config-lastnames').val($('#lastnames').text());
                    object.find('#config-email').val(correo);
                    object.find('#config-gender').val(gender);
                    object.find('#config-date').val(birthdayUser);
                    object.find('#config-country').val(country);
                    object.addClass('expanded');
                });
            }

            $('#btn-wishlist').click((event)=>{
                object = $('#wishlist-container');
                if(object.hasClass('expanded')){
                    object.removeClass('expanded');
                    if(type == 0){
                        $('.profile-information-container').removeClass('pushed-down');
                    }
                    $('.btn-wishlist').removeClass('selected');
                } else {
                    object.addClass('expanded');
                    if(type == 0){  
                        $('.profile-information-container').addClass('pushed-down');
                    }
                    $('.btn-wishlist').addClass('selected');
                    window.scroll({
                        top: 0, 
                        left: 0, 
                        behavior: 'smooth' 
                    });
                }
            });

            $('.wish-creation').keyup(function(e){
                if(e.keyCode == 13){
                    var objectClass = $(this);
                    text = $(this).val(); 
                    if(/\S/.test(text)){
                        $.ajax({
                            url: "../rutas_ajax/perfiles/deseo.php?",
                            type: "POST",
                            data: 'nombre='+text+'&deseo=&tipo=1',
                            success: function(r){
                                if(r > 0){  
                                    var wishId = r;
                                    object = $('#wishlist').find('.wishes');
                                    if(object.length == 0){
                                        rows = '';
                                        rows += '<span class="wishes">';
                                        rows += `<span wish-id="${wishId}" class="wish">${text} <a class="wish-delete"><i class="fas fa-times"></i></a></span>`;
                                        rows += '</span>';
                                        $('#wishlist').html(rows);
                                    }else{
                                        rows = '';
                                        rows += `<span wish-id="${wishId}" class="wish">${text} <a class="wish-delete"><i class="fas fa-times"></i></a></span>`;
                                        object.prepend(rows);
                                    }
                                    $('#wishlist').find('.wishes').find('.wish-delete').first().click((event)=>{
                                        removeWish(event.target);
                                    });
                                    objectClass.val("");
                                }                             
                            },
                        });                                                
                    }
                }
            });

            $('#wishlist').find('.wishes').find('.wish-delete').click((event)=>{
                removeWish(event.target);
            });

            function removeWish(wish){
                object = $(wish).parent().parent();  
                var wishId = object.attr('wish-id');
                object.remove();
                $.ajax({
                    url: "../rutas_ajax/perfiles/deseo.php?",
                    type: "POST",
                    data: 'nombre='+text+'&deseo='+ wishId + '&tipo=2',
                    success: function(r){
                    },
                });
                if($('#wishlist').find('.wishes').find('.wish').length == 0){
                    rows = '<span class="no-wishes"><i class="fas fa-box-open"></i> No tienes deseos</span>';
                    $('#wishlist').html(rows);
                }
            }
        }, 10);
    }

    //Función para generar las tarjetas de usuario, que recibe [id] del usuario, [name] primer nombre del usuario, [lastname] que es 0 si el apellido en común es el primer apellido del usuario que inició sesión, 1 si el segundo es el común y 2 si no tienen apellidos en común, [image] que es el path a la imagen del usuario y [following] que es true si el usuario actual está siguiendo a este.
    function generateUserCard(id, name, group, image, following){
        rows = '';
        rows += (following)? `<span user-id="${id}" class="user-card following flex-image">` : `<span user-id="${id}" class="user-card flex-image">`;
        //rows += `<span class="follow-indicator"><i class="fas fa-check-circle"></i></span>`;
        rows += `<img class="image top-left" src="${image}">`;
        rows += `<span class="name">${name}</span>`;
        rows += `</span>`;
        $('.profile-information-container').find('.family-information').find('.users-container').each((index, element)=>{
            var element = $(element);
            if(element.attr('group-id') == group){
                element.append(rows);
                object = element.find('.user-card').last();
                (object.find('img')[0]).onload = (event)=>{
                    flexImage(event.target);
                };
                object.click((event)=>{
                });
            }
        });
    }

    var imagenValida = false;
    function readImg(input) {
        if (input.files && input.files[0]) {        
            var file = input.files[0];
            imageFile = file.type;
            var match = ["image/jpeg", "image/png", "image/jpg", "image/webp"];
            if (!(imageFile == match[0] || imageFile == match[1] || imageFile == match[2] || imageFile == match[3])){
                //alert("FORMATO NO VALIDO");
            }else {
                imagenValida = true;
                // var reader = new FileReader();
                // reader.onload = function (e) {
                //     $('.image-input-container').addClass('image-selected');
                //     $('#img-viewer').attr('src', e.target.result);
                // };
                // reader.readAsDataURL(input.files[0]);
                if(imagenValida){
                    //GUARDAMOS LA IMAGEN
                    const files = document.querySelector('[type=file]').files;
                    const formData = new FormData();
                    for (let i = 0; i < files.length; i++) {
                        let file = files[i];
                        formData.append('files[]', file);
                    }

                    fetch("../rutas_ajax/perfiles/upload.php?", 
                    {
                        method: 'POST',
                        body: formData
                    })
                    .then(function(response) {
                        return response.text();
                    })
                    .then(function(data) {
                        console.log(data);
                        // location.reload();
                    })
                    .catch(function(err) {
                        console.error(err);
                    });
                }else{
                    //alert("seleccione un archivo valido");
                }                  
            }
        }
    }

    flexFont = function () {
        var divs = document.getElementsByClassName("flexFont");
        for(var i = 0; i < divs.length; i++) {
            var relFontsize = divs[i].offsetWidth*0.1;
            divs[i].style.fontSize = relFontsize+'px';
        }
    };

    window.onload = function(event) {
        flexFont();
    };

    window.onresize = function(event) {
        flexFont();
        flexImage();
    };

    function follow(follow){
        if(!follow){
            $.ajax({
                url: "../rutas_ajax/perfiles/seguir.php?",
                type: "POST",
                data: 'tipo=2&perfil='+profile,
                success: function(r){                        
                },
            }); 
            $('.profile-title').removeClass('following');
            $('.button-section').find('.follow').html('Seguir');
        }else{
            $.ajax({
                url: "../rutas_ajax/perfiles/seguir.php?",
                type: "POST",
                data: 'tipo=1&perfil='+profile,
                success: function(r){
                },
            });             
            $('.profile-title').addClass('following');
            $('.button-section').find('.follow').html('<i class="fas fa-check-circle"></i> Siguiendo');
        }
    }

    function listUserInfo(profile){
        var type = 1;
        if(profile == undefined) {
            profile="";
            type = 0;
        }
        $.ajax({
            url: "../rutas_ajax/perfiles/informacion_usuario.php?",
            type: "POST",
            data: "perfil=" + profile,
            success: function(r){
                obj = JSON.parse(r);
                //en 0 viene la informacion del usuario actual
                // nombreCompleto = obj[0].nombres + " " + obj[0].apellidos;
                var groups = [];
                var groupNames = [];
                var wishes = [];
                var i;
                for(i = 1; i < obj.length - 1; i++){
                    // if(obj[i][1].length > 0){
                        groups.push(obj[i][0].grupo_id);
                        groupNames.push(obj[i][0].apellido);
                    // }
                }

                //recorremos los deseos
                i = 0;
                for(i = 0; i < obj[obj.length - 1].length; i++){
                    wishes.push(obj[obj.length - 1][i]);
                }

                isfollow = false;
                if(obj[0].isfollow == 1)  isfollow = true;
                if(obj[0].genero == undefined || obj[0].genero == null) genero = "";
                else genero = obj[0].genero;
                generateUserProfile(type, obj[0].correo, obj[0].usuario, obj[0].nombres,obj[0].apellidos, obj[0].fecha_nacimiento, genero, obj[0].pais, '../../assets/img/users/' + obj[0].name_img+"."+obj[0].formato_img, groups,groupNames,isfollow,wishes, ()=>{
                    for(i = 1; i < (obj.length - 1); i++){
                        for(var j = 0; j < obj[i][1].length; j++){
                            generateUserCard(obj[i][1][j].usuario_id, obj[i][1][j].nombres.split(" ")[0], obj[i][0].grupo_id,'../../assets/img/users/' + obj[i][1][j].name_img+"."+obj[i][1][j].formato_img, false);
                        }
                    }
                });                         
            },
        });        
    }

    $(document).ready(()=>{
        $('.configuration-cancel').click((event)=>{
            $('#configuration').removeClass('expanded');
        });

        $('.configuration-accept').click((event)=>{
            nombres = $("#config-names").val();
            apellidos = $("#config-lastnames").val();
            correo = $("#config-email").val();
            fecha = $("#config-date").val();
            genero = $("#config-gender").val();
            pais = $("#config-country").val();
            lastPassword = $("#config-old-pass").val();
            newPassword1 = $("#config-new-pass").val();
            newPassword2 = $("#config-repeat-pass").val();
            if(newPassword1 != newPassword2 && (newPassword1.length > 0 || newPassword2.length > 0)){
                showMessage("warning","Configuración.","Las nuevas contraseñas no coinciden.");
                $("#config-new-pass").val("");
                $("#config-repeat-pass").val("");
            }
            else{
                $.ajax({
                    url: "../rutas_ajax/perfiles/update.php?",
                    type: "POST",
                    data: 'nombres='+nombres+'&apellidos='+ apellidos + '&correo=' + correo + '&fecha=' + fecha + '&genero=' + genero + '&pais=' + pais + '&last=' + lastPassword + '&new=' + newPassword1,
                    success: function(r){
                        // console.log(r);
                        if(r == 1){
                            //cambios exitosamente
                            showMessage("success","Configuración.","Información actualizada exitosamente.");
                            $('#configuration').removeClass('expanded');
                            $("#config-new-pass").val("");
                            $("#config-repeat-pass").val("");  
                            $("#config-old-pass").val("");  
                        }else if(r == 0){
                            //error old password
                            showMessage("error","Configuración.","Escriba correctamente la contraseña anterior.");
                            $("#config-old-pass").val("");
                        }
                    },
                });        
            }    
        });

        $(document).on('click', '.user-card', function () {
            id = $(this).attr("user-id");
            $(location).attr('href', 'profile.php?id=' + id);
        });

        actualUrl = window.location.href;
        profile = (actualUrl.split("=")[1]);
        listUserInfo(profile);

        $('.expand-profile-picture').click((event)=>{
            $('.profile-title').addClass('expanded');
        });

    });

</script>