@extends("template/main")

@section("page_title")
Edit profile {{$player->nick}}
@stop


@section("container")
<div class="row">

    <div class="col-md-6 col-md-offset-3">
        <div class="well">
            <h3>Edit player profile</h3>
            {{ Form::open(array('url' => URL::route('savePlayerSettings'), 'files' => true )) }}
            <!--<form role="form" method="post" action="{{ URL::route('savePlayerSettings') }}">-->
            <div class="form-group">
                <label for="image">Your Photo:</label>
                <input name="image" id="image" type="file" />
            </div>
            <div class="form-group">
                <label for="nick">Nick:</label>
                <input type="text" class="form-control" id="nick" name="nick" placeholder="Enter Nickname" value="{{$player->nick}}" >
                @if($errors->has('email'))
                <label class="text-danger" for="nick">
                    {{ $errors->first('email') }}
                </label>
                @endif 
            </div>
            <div class="form-group">
                <label for="usernameinput">Name:</label>
                <input type="text" class="form-control" id="usernameinput" name="name" placeholder="Enter Firstname" value="{{$player->name}}" >  
                @if($errors->has('username'))
                <label class="text-danger" for="inputError">
                    {{ $errors->first('username') }}
                </label>
                @endif 
            </div>
            <div class="form-group">
                <label for="emailinput">Lastname:</label>
                <input type="text" class="form-control" id="emailinput" name="lastname" placeholder="Enter Lastname" value="{{$player->lastname}}" >
                @if($errors->has('email'))
                <label class="text-danger" for="inputError">
                    {{ $errors->first('email') }}
                </label>
                @endif 
            </div>
            <div class="form-group">
                <label for="nick">Position:</label>
                <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position" value="{{$player->position}}" >
                @if($errors->has('email'))
                <label class="text-danger" for="nick">
                    {{ $errors->first('email') }}
                </label>
                @endif 
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea class="form-control" id="about" name="about" placeholder="Enter few lines about yourself.">{{$player->bio}}</textarea>
                @if($errors->has('password'))
                <label class="text-danger" for="inputError">
                    {{ $errors->first('password') }}
                </label>
                @endif 
            </div>
            <div class="form-group">
                <label for="country">Country</label>

                <?php $country = $player->country; ?>

                <select name="country" id="country" class="form-control">
                    <option value="United States" <?php if ($country == "United States") {
                    echo 'selected="selected"';
                } ?> >United States</option>
                    <option value="United Kingdom" <?php if ($country == "United Kingdom") {
                    echo 'selected="selected"';
                } ?> >United Kingdom</option>
                    <option value="Afghanistan" <?php if ($country == "Afghanistan") {
                    echo 'selected="selected"';
                } ?> >Afghanistan</option>
                    <option value="Albania" <?php if ($country == "Albania") {
                    echo 'selected="selected"';
                } ?> >Albania</option>
                    <option value="Algeria" <?php if ($country == "Algeria") {
                    echo 'selected="selected"';
                } ?> >Algeria</option>
                    <option value="American Samoa" <?php if ($country == "American Samoa") {
                    echo 'selected="selected"';
                } ?> >American Samoa</option>
                    <option value="Andorra" <?php if ($country == "Andorra") {
                    echo 'selected="selected"';
                } ?> >Andorra</option>
                    <option value="Angola" <?php if ($country == "Angola") {
                    echo 'selected="selected"';
                } ?> >Angola</option>
                    <option value="Anguilla" <?php if ($country == "Anguilla") {
                    echo 'selected="selected"';
                } ?> >Anguilla</option>
                    <option value="Antarctica" <?php if ($country == "Antarctica") {
                    echo 'selected="selected"';
                } ?> >Antarctica</option>
                    <option value="Antigua and Barbuda" <?php if ($country == "Antigua and Barbuda") {
                    echo 'selected="selected"';
                } ?> >Antigua and Barbuda</option>
                    <option value="Argentina" <?php if ($country == "Argentina") {
                    echo 'selected="selected"';
                } ?> >Argentina</option>
                    <option value="Armenia" <?php if ($country == "Armenia") {
                    echo 'selected="selected"';
                } ?> >Armenia</option>
                    <option value="Aruba" <?php if ($country == "Aruba") {
                    echo 'selected="selected"';
                } ?> >Aruba</option>
                    <option value="Australia" <?php if ($country == "Australia") {
                    echo 'selected="selected"';
                } ?> >Australia</option>
                    <option value="Austria" <?php if ($country == "Austria") {
                    echo 'selected="selected"';
                } ?> >Austria</option>
                    <option value="Azerbaijan" <?php if ($country == "Azerbaijan") {
                    echo 'selected="selected"';
                } ?> >Azerbaijan</option>
                    <option value="Bahamas" <?php if ($country == "Bahamas") {
                    echo 'selected="selected"';
                } ?> >Bahamas</option>
                    <option value="Bahrain" <?php if ($country == "Bahrain") {
                    echo 'selected="selected"';
                } ?> >Bahrain</option>
                    <option value="Bangladesh" <?php if ($country == "Bangladesh") {
                    echo 'selected="selected"';
                } ?> >Bangladesh</option>
                    <option value="Barbados" <?php if ($country == "Barbados") {
                    echo 'selected="selected"';
                } ?> >Barbados</option>
                    <option value="Belarus" <?php if ($country == "Belarus") {
                    echo 'selected="selected"';
                } ?> >Belarus</option>
                    <option value="Belgium" <?php if ($country == "Belgium") {
                    echo 'selected="selected"';
                } ?> >Belgium</option>
                    <option value="Belize" <?php if ($country == "Belize") {
                    echo 'selected="selected"';
                } ?> >Belize</option>
                    <option value="Benin" <?php if ($country == "Benin") {
                    echo 'selected="selected"';
                } ?> >Benin</option>
                    <option value="Bermuda" <?php if ($country == "Bermuda") {
                    echo 'selected="selected"';
                } ?> >Bermuda</option>
                    <option value="Bhutan" <?php if ($country == "Bhutan") {
                    echo 'selected="selected"';
                } ?> >Bhutan</option>
                    <option value="Bolivia" <?php if ($country == "Bolivia") {
                    echo 'selected="selected"';
                } ?> >Bolivia</option>
                    <option value="Bosnia and Herzegovina" <?php if ($country == "United") {
                    echo 'selected="selected"';
                } ?> >Bosnia and Herzegovina</option>
                    <option value="Botswana" <?php if ($country == "Bosnia and Herzegovina") {
                    echo 'selected="selected"';
                } ?> >Botswana</option>
                    <option value="Bouvet Island" <?php if ($country == "Bouvet Island") {
                    echo 'selected="selected"';
                } ?> >Bouvet Island</option>
                    <option value="Brazil" <?php if ($country == "Brazil") {
                    echo 'selected="selected"';
                } ?> >Brazil</option>
                    <option value="British Indian Ocean Territory" <?php if ($country == "British Indian Ocean Territory") {
                    echo 'selected="selected"';
                } ?> >British Indian Ocean Territory</option>
                    <option value="Brunei Darussalam" <?php if ($country == "Brunei Darussalam") {
                    echo 'selected="selected"';
                } ?> >Brunei Darussalam</option>
                    <option value="Bulgaria" <?php if ($country == "Bulgaria") {
                    echo 'selected="selected"';
                } ?> >Bulgaria</option>
                    <option value="Burkina Faso" <?php if ($country == "Burkina Faso") {
                    echo 'selected="selected"';
                } ?> >Burkina Faso</option>
                    <option value="Burundi" <?php if ($country == "Burundi") {
                    echo 'selected="selected"';
                } ?> >Burundi</option>
                    <option value="Cambodia" <?php if ($country == "Cambodia") {
                    echo 'selected="selected"';
                } ?> >Cambodia</option>
                    <option value="Cameroon" <?php if ($country == "Cameroon") {
                    echo 'selected="selected"';
                } ?> >Cameroon</option>
                    <option value="Canada" <?php if ($country == "Canada") {
                    echo 'selected="selected"';
                } ?> >Canada</option>
                    <option value="Cape Verde" <?php if ($country == "Cape Verde") {
                    echo 'selected="selected"';
                } ?> >Cape Verde</option>
                    <option value="Cayman Islands" <?php if ($country == "Cayman Islands") {
                    echo 'selected="selected"';
                } ?> >Cayman Islands</option>
                    <option value="Central African Republic" <?php if ($country == "Central African Republic") {
                    echo 'selected="selected"';
                } ?> >Central African Republic</option>
                    <option value="Chad" <?php if ($country == "Chad") {
                    echo 'selected="selected"';
                } ?> >Chad</option>
                    <option value="Chile" <?php if ($country == "Chile") {
                    echo 'selected="selected"';
                } ?> >Chile</option>
                    <option value="China" <?php if ($country == "China") {
                    echo 'selected="selected"';
                } ?> >China</option>
                    <option value="Christmas Island" <?php if ($country == "Christmas Island") {
                    echo 'selected="selected"';
                } ?> >Christmas Island</option>
                    <option value="Cocos (Keeling) Islands" <?php if ($country == "Cocos (Keeling) Islands") {
                    echo 'selected="selected"';
                } ?> >Cocos (Keeling) Islands</option>
                    <option value="Colombia" <?php if ($country == "Colombia") {
                    echo 'selected="selected"';
                } ?> >Colombia</option>
                    <option value="Comoros" <?php if ($country == "Comoros") {
                    echo 'selected="selected"';
                } ?> >Comoros</option>
                    <option value="Congo" <?php if ($country == "Congo") {
                    echo 'selected="selected"';
                } ?> >Congo</option>
                    <option value="Congo, The Democratic Republic of The" <?php if ($country == "Congo, The Democratic Republic of The") {
                    echo 'selected="selected"';
                } ?> >Congo, The Democratic Republic of The</option>
                    <option value="Cook Islands" <?php if ($country == "Cook Islands") {
                    echo 'selected="selected"';
                } ?> >Cook Islands</option>
                    <option value="Costa Rica" <?php if ($country == "Costa Rica") {
                    echo 'selected="selected"';
                } ?> >Costa Rica</option>
                    <option value="Cote D`ivoire" <?php if ($country == "Cote D`ivoire") {
                    echo 'selected="selected"';
                } ?> >Cote D'ivoire</option>
                    <option value="Croatia" <?php if ($country == "Croatia") {
                    echo 'selected="selected"';
                } ?> >Croatia</option>
                    <option value="Cuba" <?php if ($country == "Cuba") {
                    echo 'selected="selected"';
                } ?> >Cuba</option>
                    <option value="Cyprus" <?php if ($country == "Cyprus") {
                    echo 'selected="selected"';
                } ?> >Cyprus</option>
                    <option value="Czech Republic" <?php if ($country == "Czech Republic") {
                    echo 'selected="selected"';
                } ?> >Czech Republic</option>
                    <option value="Denmark" <?php if ($country == "Denmark") {
                    echo 'selected="selected"';
                } ?> >Denmark</option>
                    <option value="Djibouti" <?php if ($country == "Djibouti") {
                    echo 'selected="selected"';
                } ?> >Djibouti</option>
                    <option value="Dominica" <?php if ($country == "Dominica") {
                    echo 'selected="selected"';
                } ?> >Dominica</option>
                    <option value="Dominican Republic" <?php if ($country == "Dominican Republic") {
                    echo 'selected="selected"';
                } ?> >Dominican Republic</option>
                    <option value="Ecuador" <?php if ($country == "Ecuador") {
                    echo 'selected="selected"';
                } ?> >Ecuador</option>
                    <option value="Egypt" <?php if ($country == "Egypt") {
                    echo 'selected="selected"';
                } ?> >Egypt</option>
                    <option value="El Salvador" <?php if ($country == "El Salvador") {
                    echo 'selected="selected"';
                } ?> >El Salvador</option>
                    <option value="Equatorial Guinea" <?php if ($country == "Equatorial Guinea") {
                    echo 'selected="selected"';
                } ?> >Equatorial Guinea</option>
                    <option value="Eritrea" <?php if ($country == "Eritrea") {
                    echo 'selected="selected"';
                } ?> >Eritrea</option>
                    <option value="Estonia" <?php if ($country == "Estonia") {
                    echo 'selected="selected"';
                } ?> >Estonia</option>
                    <option value="Ethiopia" <?php if ($country == "Ethiopia") {
                    echo 'selected="selected"';
                } ?> >Ethiopia</option>
                    <option value="Falkland Islands (Malvinas)" <?php if ($country == "Falkland Islands (Malvinas)") {
                    echo 'selected="selected"';
                } ?> >Falkland Islands (Malvinas)</option>
                    <option value="Faroe Islands" <?php if ($country == "Faroe Islands") {
                    echo 'selected="selected"';
                } ?> >Faroe Islands</option>
                    <option value="Fiji" <?php if ($country == "Fiji") {
                    echo 'selected="selected"';
                } ?> >Fiji</option>
                    <option value="Finland" <?php if ($country == "Finland") {
                    echo 'selected="selected"';
                } ?> >Finland</option>
                    <option value="France" <?php if ($country == "France") {
                    echo 'selected="selected"';
                } ?> >France</option>
                    <option value="French Guiana" <?php if ($country == "French Guiana") {
                    echo 'selected="selected"';
                } ?> >French Guiana</option>
                    <option value="French Polynesia" <?php if ($country == "French Polynesia") {
                    echo 'selected="selected"';
                } ?> >French Polynesia</option>
                    <option value="French Southern Territories" <?php if ($country == "French Southern Territories") {
                    echo 'selected="selected"';
                } ?> >French Southern Territories</option>
                    <option value="Gabon" <?php if ($country == "Gabon") {
                    echo 'selected="selected"';
                } ?> >Gabon</option>
                    <option value="Gambia" <?php if ($country == "Gambia") {
                    echo 'selected="selected"';
                } ?> >Gambia</option>
                    <option value="Georgia" <?php if ($country == "Georgia") {
                    echo 'selected="selected"';
                } ?> >Georgia</option>
                    <option value="Germany" <?php if ($country == "Germany") {
                    echo 'selected="selected"';
                } ?> >Germany</option>
                    <option value="Ghana" <?php if ($country == "Ghana") {
                    echo 'selected="selected"';
                } ?> >Ghana</option>
                    <option value="Gibraltar" <?php if ($country == "Gibraltar") {
                    echo 'selected="selected"';
                } ?> >Gibraltar</option>
                    <option value="Greece" <?php if ($country == "Greece") {
                    echo 'selected="selected"';
                } ?> >Greece</option>
                    <option value="Greenland" <?php if ($country == "Greenland") {
                    echo 'selected="selected"';
                } ?> >Greenland</option>
                    <option value="Grenada" <?php if ($country == "Grenada") {
                    echo 'selected="selected"';
                } ?> >Grenada</option>
                    <option value="Guadeloupe" <?php if ($country == "Guadeloupe") {
                    echo 'selected="selected"';
                } ?> >Guadeloupe</option>
                    <option value="Guam" <?php if ($country == "Guam") {
                    echo 'selected="selected"';
                } ?> >Guam</option>
                    <option value="Guatemala" <?php if ($country == "Guatemala") {
                    echo 'selected="selected"';
                } ?> >Guatemala</option>
                    <option value="Guinea" <?php if ($country == "Guinea") {
                    echo 'selected="selected"';
                } ?> >Guinea</option>
                    <option value="Guinea-bissau" <?php if ($country == "Guinea-bissau") {
                    echo 'selected="selected"';
                } ?> >Guinea-bissau</option>
                    <option value="Guyana" <?php if ($country == "Guyana") {
                    echo 'selected="selected"';
                } ?> >Guyana</option>
                    <option value="Haiti" <?php if ($country == "Haiti") {
                    echo 'selected="selected"';
                } ?> >Haiti</option>
                    <option value="Heard Island and Mcdonald Islands" <?php if ($country == "Heard Island and Mcdonald Islands") {
                    echo 'selected="selected"';
                } ?> >Heard Island and Mcdonald Islands</option>
                    <option value="Holy See (Vatican City State)" <?php if ($country == "Holy See (Vatican City State)") {
                    echo 'selected="selected"';
                } ?> >Holy See (Vatican City State)</option>
                    <option value="Honduras" <?php if ($country == "Honduras") {
                    echo 'selected="selected"';
                } ?> >Honduras</option>
                    <option value="Hong Kong" <?php if ($country == "Hong Kong") {
                    echo 'selected="selected"';
                } ?> >Hong Kong</option>
                    <option value="Hungary" <?php if ($country == "Hungary") {
                    echo 'selected="selected"';
                } ?> >Hungary</option>
                    <option value="Iceland" <?php if ($country == "Iceland") {
                    echo 'selected="selected"';
                } ?> >Iceland</option>
                    <option value="India" <?php if ($country == "India") {
                    echo 'selected="selected"';
                } ?> >India</option>
                    <option value="Indonesia" <?php if ($country == "Indonesia") {
                    echo 'selected="selected"';
                } ?> >Indonesia</option>
                    <option value="Iran, Islamic Republic of" <?php if ($country == "Iran, Islamic Republic of") {
                    echo 'selected="selected"';
                } ?> >Iran, Islamic Republic of</option>
                    <option value="Iraq" <?php if ($country == "Iraq") {
                    echo 'selected="selected"';
                } ?> >Iraq</option>
                    <option value="Ireland" <?php if ($country == "Ireland") {
                    echo 'selected="selected"';
                } ?> >Ireland</option>
                    <option value="Israel" <?php if ($country == "Israel") {
                    echo 'selected="selected"';
                } ?> >Israel</option>
                    <option value="Italy" <?php if ($country == "Italy") {
                    echo 'selected="selected"';
                } ?> >Italy</option>
                    <option value="Jamaica" <?php if ($country == "Jamaica") {
                    echo 'selected="selected"';
                } ?> >Jamaica</option>
                    <option value="Japan" <?php if ($country == "Japan") {
                    echo 'selected="selected"';
                } ?> >Japan</option>
                    <option value="Jordan" <?php if ($country == "Jordan") {
                    echo 'selected="selected"';
                } ?> >Jordan</option>
                    <option value="Kazakhstan" <?php if ($country == "Kazakhstan") {
                    echo 'selected="selected"';
                } ?> >Kazakhstan</option>
                    <option value="Kenya" <?php if ($country == "Kenya") {
                    echo 'selected="selected"';
                } ?> >Kenya</option>
                    <option value="Kiribati" <?php if ($country == "Kiribati") {
                    echo 'selected="selected"';
                } ?> >Kiribati</option>
                    <option value="Korea, Democratic Peoples Republic of" <?php if ($country == "Korea, Democratic People's Republic of") {
                    echo 'selected="selected"';
                } ?> >Korea, Democratic People's Republic of</option>
                    <option value="Korea, Republic of" <?php if ($country == "Korea, Republic of") {
                    echo 'selected="selected"';
                } ?> >Korea, Republic of</option>
                    <option value="Kuwait" <?php if ($country == "Kuwait") {
                    echo 'selected="selected"';
                } ?> >Kuwait</option>
                    <option value="Kyrgyzstan" <?php if ($country == "Kyrgyzstan") {
                    echo 'selected="selected"';
                } ?> >Kyrgyzstan</option>
                    <option value="Lao Peoples Democratic Republic" <?php if ($country == "Lao People's Democratic Republic") {
                    echo 'selected="selected"';
                } ?> >Lao People's Democratic Republic</option>
                    <option value="Latvia" <?php if ($country == "Latvia") {
                    echo 'selected="selected"';
                } ?> >Latvia</option>
                    <option value="Lebanon" <?php if ($country == "Lebanon") {
                    echo 'selected="selected"';
                } ?> >Lebanon</option>
                    <option value="Lesotho" <?php if ($country == "Lesotho") {
                    echo 'selected="selected"';
                } ?> >Lesotho</option>
                    <option value="Liberia" <?php if ($country == "Liberia") {
                    echo 'selected="selected"';
                } ?> >Liberia</option>
                    <option value="Libyan Arab Jamahiriya" <?php if ($country == "Libyan Arab Jamahiriya") {
                    echo 'selected="selected"';
                } ?> >Libyan Arab Jamahiriya</option>
                    <option value="Liechtenstein" <?php if ($country == "Liechtenstein") {
                    echo 'selected="selected"';
                } ?> >Liechtenstein</option>
                    <option value="Lithuania" <?php if ($country == "Lithuania") {
                    echo 'selected="selected"';
                } ?> >Lithuania</option>
                    <option value="Luxembourg" <?php if ($country == "Luxembourg") {
                    echo 'selected="selected"';
                } ?> >Luxembourg</option>
                    <option value="Macao" <?php if ($country == "Macao") {
                    echo 'selected="selected"';
                } ?> >Macao</option>
                    <option value="Macedonia, The Former Yugoslav Republic of" <?php if ($country == "Macedonia, The Former Yugoslav Republic of") {
                    echo 'selected="selected"';
                } ?> >Macedonia, The Former Yugoslav Republic of</option>
                    <option value="Madagascar" <?php if ($country == "Madagascar") {
                    echo 'selected="selected"';
                } ?> >Madagascar</option>
                    <option value="Malawi" <?php if ($country == "Malawi") {
                    echo 'selected="selected"';
                } ?> >Malawi</option>
                    <option value="Malaysia" <?php if ($country == "Malaysia") {
                    echo 'selected="selected"';
                } ?> >Malaysia</option>
                    <option value="Maldives" <?php if ($country == "Maldives") {
                    echo 'selected="selected"';
                } ?> >Maldives</option>
                    <option value="Mali" <?php if ($country == "Mali") {
                    echo 'selected="selected"';
                } ?> >Mali</option>
                    <option value="Malta" <?php if ($country == "Malta") {
                    echo 'selected="selected"';
                } ?> >Malta</option>
                    <option value="Marshall Islands" <?php if ($country == "Marshall Islands") {
                    echo 'selected="selected"';
                } ?> >Marshall Islands</option>
                    <option value="Martinique" <?php if ($country == "Martinique") {
                    echo 'selected="selected"';
                } ?> >Martinique</option>
                    <option value="Mauritania" <?php if ($country == "Mauritania") {
                    echo 'selected="selected"';
                } ?> >Mauritania</option>
                    <option value="Mauritius" <?php if ($country == "Mauritius") {
                    echo 'selected="selected"';
                } ?> >Mauritius</option>
                    <option value="Mayotte" <?php if ($country == "Mayotte") {
                    echo 'selected="selected"';
                } ?> >Mayotte</option>
                    <option value="Mexico" <?php if ($country == "Mexico") {
                    echo 'selected="selected"';
                } ?> >Mexico</option>
                    <option value="Micronesia, Federated States of" <?php if ($country == "Micronesia, Federated States of") {
                    echo 'selected="selected"';
                } ?> >Micronesia, Federated States of</option>
                    <option value="Moldova, Republic of" <?php if ($country == "Moldova, Republic of") {
                    echo 'selected="selected"';
                } ?> >Moldova, Republic of</option>
                    <option value="Monaco" <?php if ($country == "Monaco") {
                    echo 'selected="selected"';
                } ?> >Monaco</option>
                    <option value="Mongolia" <?php if ($country == "Mongolia") {
                    echo 'selected="selected"';
                } ?> >Mongolia</option>
                    <option value="Montserrat" <?php if ($country == "Montserrat") {
                    echo 'selected="selected"';
                } ?> >Montserrat</option>
                    <option value="Morocco" <?php if ($country == "Morocco") {
                    echo 'selected="selected"';
                } ?> >Morocco</option>
                    <option value="Mozambique" <?php if ($country == "Mozambique") {
                    echo 'selected="selected"';
                } ?> >Mozambique</option>
                    <option value="Myanmar" <?php if ($country == "Myanmar") {
                    echo 'selected="selected"';
                } ?> >Myanmar</option>
                    <option value="Namibia" <?php if ($country == "Namibia") {
                    echo 'selected="selected"';
                } ?> >Namibia</option>
                    <option value="Nauru" <?php if ($country == "Nauru") {
                    echo 'selected="selected"';
                } ?> >Nauru</option>
                    <option value="Nepal" <?php if ($country == "Nepal") {
                    echo 'selected="selected"';
                } ?> >Nepal</option>
                    <option value="Netherlands" <?php if ($country == "Netherlands") {
                    echo 'selected="selected"';
                } ?> >Netherlands</option>
                    <option value="Netherlands Antilles" <?php if ($country == "Netherlands Antilles") {
                    echo 'selected="selected"';
                } ?> >Netherlands Antilles</option>
                    <option value="New Caledonia" <?php if ($country == "New Caledonia") {
                    echo 'selected="selected"';
                } ?> >New Caledonia</option>
                    <option value="New Zealand" <?php if ($country == "New Zealand") {
                    echo 'selected="selected"';
                } ?> >New Zealand</option>
                    <option value="Nicaragua" <?php if ($country == "Nicaragua") {
                    echo 'selected="selected"';
                } ?> >Nicaragua</option>
                    <option value="Niger" <?php if ($country == "Niger") {
                    echo 'selected="selected"';
                } ?> >Niger</option>
                    <option value="Nigeria" <?php if ($country == "Nigeria") {
                    echo 'selected="selected"';
                } ?> >Nigeria</option>
                    <option value="Niue" <?php if ($country == "Niue") {
                    echo 'selected="selected"';
                } ?> >Niue</option>
                    <option value="Norfolk Island" <?php if ($country == "Norfolk Island") {
                    echo 'selected="selected"';
                } ?> >Norfolk Island</option>
                    <option value="Northern Mariana Islands" <?php if ($country == "Northern Mariana Islands") {
                    echo 'selected="selected"';
                } ?> >Northern Mariana Islands</option>
                    <option value="Norway" <?php if ($country == "Norway") {
                    echo 'selected="selected"';
                } ?> >Norway</option>
                    <option value="Oman" <?php if ($country == "Oman") {
                    echo 'selected="selected"';
                } ?> >Oman</option>
                    <option value="Pakistan" <?php if ($country == "Pakistan") {
                    echo 'selected="selected"';
                } ?> >Pakistan</option>
                    <option value="Palau" <?php if ($country == "Palau") {
                    echo 'selected="selected"';
                } ?> >Palau</option>
                    <option value="Palestinian Territory, Occupied" <?php if ($country == "Palestinian Territory, Occupied") {
                    echo 'selected="selected"';
                } ?> >Palestinian Territory, Occupied</option>
                    <option value="Panama" <?php if ($country == "Panama") {
                    echo 'selected="selected"';
                } ?> >Panama</option>
                    <option value="Papua New Guinea" <?php if ($country == "Papua New Guinea") {
                    echo 'selected="selected"';
                } ?> >Papua New Guinea</option>
                    <option value="Paraguay" <?php if ($country == "Paraguay") {
                    echo 'selected="selected"';
                } ?> >Paraguay</option>
                    <option value="Peru" <?php if ($country == "Peru") {
                    echo 'selected="selected"';
                } ?> >Peru</option>
                    <option value="Philippines" <?php if ($country == "Philippines") {
                    echo 'selected="selected"';
                } ?> >Philippines</option>
                    <option value="Pitcairn" <?php if ($country == "Pitcairn") {
                    echo 'selected="selected"';
                } ?> >Pitcairn</option>
                    <option value="Poland" <?php if ($country == "Poland") {
                    echo 'selected="selected"';
                } ?> >Poland</option>
                    <option value="Portugal" <?php if ($country == "Portugal") {
                    echo 'selected="selected"';
                } ?> >Portugal</option>
                    <option value="Puerto Rico" <?php if ($country == "Puerto Rico") {
                    echo 'selected="selected"';
                } ?> >Puerto Rico</option>
                    <option value="Qatar" <?php if ($country == "Qatar") {
                    echo 'selected="selected"';
                } ?> >Qatar</option>
                    <option value="Reunion" <?php if ($country == "Reunion") {
                    echo 'selected="selected"';
                } ?> >Reunion</option>
                    <option value="Romania" <?php if ($country == "Romania") {
                    echo 'selected="selected"';
                } ?> >Romania</option>
                    <option value="Russian Federation" <?php if ($country == "Russian Federation") {
                    echo 'selected="selected"';
                } ?> >Russian Federation</option>
                    <option value="Rwanda" <?php if ($country == "Rwanda") {
                    echo 'selected="selected"';
                } ?> >Rwanda</option>
                    <option value="Saint Helena" <?php if ($country == "Saint Helena") {
                    echo 'selected="selected"';
                } ?> >Saint Helena</option>
                    <option value="Saint Kitts and Nevis" <?php if ($country == "Saint Kitts and Nevis") {
                    echo 'selected="selected"';
                } ?> >Saint Kitts and Nevis</option>
                    <option value="Saint Lucia" <?php if ($country == "Saint Lucia") {
                    echo 'selected="selected"';
                } ?> >Saint Lucia</option>
                    <option value="Saint Pierre and Miquelon" <?php if ($country == "Saint Pierre and Miquelon") {
                    echo 'selected="selected"';
                } ?> >Saint Pierre and Miquelon</option>
                    <option value="Saint Vincent and The Grenadines" <?php if ($country == "Saint Vincent and The Grenadines") {
                    echo 'selected="selected"';
                } ?> >Saint Vincent and The Grenadines</option>
                    <option value="Samoa" <?php if ($country == "Samoa") {
                    echo 'selected="selected"';
                } ?> >Samoa</option>
                    <option value="San Marino" <?php if ($country == "San Marino") {
                    echo 'selected="selected"';
                } ?> >San Marino</option>
                    <option value="Sao Tome and Principe" <?php if ($country == "Sao Tome and Principe") {
                    echo 'selected="selected"';
                } ?> >Sao Tome and Principe</option>
                    <option value="Saudi Arabia" <?php if ($country == "Saudi Arabia") {
                    echo 'selected="selected"';
                } ?> >Saudi Arabia</option>
                    <option value="Senegal" <?php if ($country == "Senegal") {
                    echo 'selected="selected"';
                } ?> >Senegal</option>
                    <option value="Serbia" <?php if ($country == "Serbia") {
                    echo 'selected="selected"';
                } ?> >Serbia</option>
                    <option value="Seychelles" <?php if ($country == "Seychelles") {
                    echo 'selected="selected"';
                } ?> >Seychelles</option>
                    <option value="Sierra Leone" <?php if ($country == "Sierra Leone") {
                    echo 'selected="selected"';
                } ?> >Sierra Leone</option>
                    <option value="Singapore" <?php if ($country == "Singapore") {
                    echo 'selected="selected"';
                } ?> >Singapore</option>
                    <option value="Slovakia" <?php if ($country == "Slovakia") {
                    echo 'selected="selected"';
                } ?> >Slovakia</option>
                    <option value="Slovenia" <?php if ($country == "Slovenia") {
                    echo 'selected="selected"';
                } ?> >Slovenia</option>
                    <option value="Solomon Islands" <?php if ($country == "Solomon Islands") {
                    echo 'selected="selected"';
                } ?> >Solomon Islands</option>
                    <option value="Somalia" <?php if ($country == "Somalia") {
                    echo 'selected="selected"';
                } ?> >Somalia</option>
                    <option value="South Africa" <?php if ($country == "South Africa") {
                    echo 'selected="selected"';
                } ?> >South Africa</option>
                    <option value="South Georgia and The South Sandwich Islands" <?php if ($country == "South Georgia and The South Sandwich Islands") {
                    echo 'selected="selected"';
                } ?> >South Georgia and The South Sandwich Islands</option>
                    <option value="Spain" <?php if ($country == "Spain") {
                    echo 'selected="selected"';
                } ?> >Spain</option>
                    <option value="Sri Lanka" <?php if ($country == "Sri Lanka") {
                    echo 'selected="selected"';
                } ?> >Sri Lanka</option>
                    <option value="Sudan" <?php if ($country == "Sudan") {
                    echo 'selected="selected"';
                } ?> >Sudan</option>
                    <option value="Suriname" <?php if ($country == "Suriname") {
                    echo 'selected="selected"';
                } ?> >Suriname</option>
                    <option value="Svalbard and Jan Mayen" <?php if ($country == "Svalbard and Jan Mayen") {
                    echo 'selected="selected"';
                } ?> >Svalbard and Jan Mayen</option>
                    <option value="Swaziland" <?php if ($country == "Swaziland") {
                    echo 'selected="selected"';
                } ?> >Swaziland</option>
                    <option value="Sweden" <?php if ($country == "Sweden") {
                    echo 'selected="selected"';
                } ?> >Sweden</option>
                    <option value="Switzerland" <?php if ($country == "Switzerland") {
                    echo 'selected="selected"';
                } ?> >Switzerland</option>
                    <option value="Syrian Arab Republic" <?php if ($country == "Syrian Arab Republic") {
                    echo 'selected="selected"';
                } ?> >Syrian Arab Republic</option>
                    <option value="Taiwan, Province of China" <?php if ($country == "Taiwan, Province of China") {
                    echo 'selected="selected"';
                } ?> >Taiwan, Province of China</option>
                    <option value="Tajikistan" <?php if ($country == "Tajikistan") {
                    echo 'selected="selected"';
                } ?> >Tajikistan</option>
                    <option value="Tanzania, United Republic of" <?php if ($country == "Tanzania, United Republic of") {
                    echo 'selected="selected"';
                } ?> >Tanzania, United Republic of</option>
                    <option value="Thailand" <?php if ($country == "Thailand") {
                    echo 'selected="selected"';
                } ?> >Thailand</option>
                    <option value="Timor-leste" <?php if ($country == "Timor-leste") {
                    echo 'selected="selected"';
                } ?> >Timor-leste</option>
                    <option value="Togo" <?php if ($country == "Togo") {
                    echo 'selected="selected"';
                } ?> >Togo</option>
                    <option value="Tokelau" <?php if ($country == "Tokelau") {
                    echo 'selected="selected"';
                } ?> >Tokelau</option>
                    <option value="Tonga" <?php if ($country == "Tonga") {
                    echo 'selected="selected"';
                } ?> >Tonga</option>
                    <option value="Trinidad and Tobago" <?php if ($country == "Trinidad and Tobago") {
                    echo 'selected="selected"';
                } ?> >Trinidad and Tobago</option>
                    <option value="Tunisia" <?php if ($country == "Tunisia") {
                    echo 'selected="selected"';
                } ?> >Tunisia</option>
                    <option value="Turkey" <?php if ($country == "Turkey") {
                    echo 'selected="selected"';
                } ?> >Turkey</option>
                    <option value="Turkmenistan" <?php if ($country == "Turkmenistan") {
                    echo 'selected="selected"';
                } ?> >Turkmenistan</option>
                    <option value="Turks and Caicos Islands" <?php if ($country == "Turks and Caicos Islands") {
                    echo 'selected="selected"';
                } ?> >Turks and Caicos Islands</option>
                    <option value="Tuvalu" <?php if ($country == "Tuvalu") {
                    echo 'selected="selected"';
                } ?> >Tuvalu</option>
                    <option value="Uganda" <?php if ($country == "Uganda") {
                    echo 'selected="selected"';
                } ?> >Uganda</option>
                    <option value="Ukraine" <?php if ($country == "Ukraine") {
                    echo 'selected="selected"';
                } ?> >Ukraine</option>
                    <option value="United Arab Emirates" <?php if ($country == "United Arab Emirates") {
                    echo 'selected="selected"';
                } ?> >United Arab Emirates</option>
                    <option value="United Kingdom" <?php if ($country == "United Kingdom") {
                    echo 'selected="selected"';
                } ?> >United Kingdom</option>
                    <option value="United States Minor Outlying Islands" <?php if ($country == "United States Minor Outlying Islands") {
                    echo 'selected="selected"';
                } ?> >United States Minor Outlying Islands</option>
                    <option value="Uruguay" <?php if ($country == "Uruguay") {
                    echo 'selected="selected"';
                } ?> >Uruguay</option>
                    <option value="Uzbekistan <?php if ($country == "Uzbekistan") {
                    echo 'selected="selected"';
                } ?> ">Uzbekistan</option>
                    <option value="Vanuatu" <?php if ($country == "Vanuatu") {
                    echo 'selected="selected"';
                } ?> >Vanuatu</option>
                    <option value="Venezuela" <?php if ($country == "Venezuela") {
                    echo 'selected="selected"';
                } ?> >Venezuela</option>
                    <option value="Vietnam" <?php if ($country == "Vietnam") {
                    echo 'selected="selected"';
                } ?> >Vietnam</option>
                    <option value="Virgin Islands, British" <?php if ($country == "Virgin Islands, British") {
                    echo 'selected="selected"';
                } ?> >Virgin Islands, British</option>
                    <option value="Virgin Islands, U.S." <?php if ($country == "Virgin Islands, U.S.") {
                    echo 'selected="selected"';
                } ?> >Virgin Islands, U.S.</option>
                    <option value="Wallis and Futuna" <?php if ($country == "Wallis and Futuna") {
                    echo 'selected="selected"';
                } ?> >Wallis and Futuna</option>
                    <option value="Western Sahara" <?php if ($country == "Western Sahara") {
                    echo 'selected="selected"';
                } ?> >Western Sahara</option>
                    <option value="Yemen" <?php if ($country == "Yemen") {
                    echo 'selected="selected"';
                } ?> >Yemen</option>
                    <option value="Zambia" <?php if ($country == "Zambia") {
                    echo 'selected="selected"';
                } ?> >Zambia</option>
                    <option value="Zimbabwe" <?php if ($country == "Zimbabwe") {
                    echo 'selected="selected"';
                } ?> >Zimbabwe</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fbpro">Facebook Profile:</label>
                <input type="text" class="form-control" id="fbpro" name="fbpro" placeholder="Your Facebook..." value="{{$player->facebook}}" >
                @if($errors->has('email'))
                <label class="text-danger" for="inputError">
                    {{ $errors->first('email') }}
                </label>
                @endif 
            </div>
            <div class="form-group">
                <label for="twpro">Twitter:</label>
                <input type="text" class="form-control" id="twpro" name="twpro" placeholder="Your Twitter..." value="{{$player->twitter}}" >
                @if($errors->has('email'))
                <label class="text-danger" for="inputError">
                    {{ $errors->first('email') }}
                </label>
                @endif 
            </div>
            <div class="form-group">
                <label for="weblink">Your Website:</label>
                <input type="text" class="form-control" id="weblink" name="weblink" placeholder="Your Website..." value="{{$player->website}}" >
                @if($errors->has('email'))
                <label class="text-danger" for="inputError">
                    {{ $errors->first('email') }}
                </label>
                @endif 
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{URL::previous()}}"><button type="button" class="btn btn-default">Back</button></a>
            {{ Form::token() }}
            {{ Form::close() }}  
        </div>
    </div>
</div>
@stop