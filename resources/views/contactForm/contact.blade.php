<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form 2</title>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>
<body>
    
    <div class="container">
    <div class="logo">
        <img src="{{ asset('image/clicknext_logo.png') }}" alt="Clicknext Logo"> 
        
    </div>
    <br>
        <div> 
            <hr width="95%" color="Black" /> </div>
            <br>
        <!-- <form action="{{ route('application.submit') }}" method="POST"> -->
        <form action="/contact/save" method="POST">
            @csrf
            <h1>ประวัติส่วนตัว</h1>
            <div class="form-group"><!-- name -->
                <label for="name" >ชื่อ  <span class="required-asterisk">*</span> </label>
                <input type="text" id="name" name="name" placeholder="ไม่ต้องกรอกคำนำหน้า" required>
            </div>

            <div class="form-group"><!-- กรอกนามสกุล -->
                <label for="surname">นามสกุล  <span class="required-asterisk">*</span></label>
                <input type="text" id="surname" name="surname" required>
            </div>

            <div class="form-group"><!-- ชื่อเล่น -->
                <label for="nickname">ชื่อเล่น <span class="required-asterisk">*</span></label>
                <input type="text" id="nickname" name="nickname" required>
            </div>
            
            <div class="form-group"><!-- birthday --> 
                <label for="birthday">วัน / เดือน / ปี เกิด <span class="required-asterisk">*</span></label>
                <input type="date" id="birthday" name="birthday" required>
            </div>

            <div class="form-group"><!-- ethnicity -->
                <label for="ethnicity">เชื้อชาติ <span class="required-asterisk">*</span></label>
                <input type="text" id="ethnicity" name="ethnicity" required>
            </div>

            <div class="form-group"><!-- nationality -->
                <label for="nationality">สัญชาติ<span class="required-asterisk">*</span></label>
                <input type="text" id="nationality" name="nationality" required>
            </div>


            <div class="form-group"><!-- ศาสนา -->
                <label for="religion">ศาสนา<span class="required-asterisk">*</span></label>
                <input type="text" id="religion" name="religion" required>
            </div>

            <div>
                <label for="Marital_status">สถานภาพสมรส <span class="required-asterisk">*</span></label>
                <br>
                <input type="radio" id="single" name="Marital_status" value="single">
                <label for="single">โสด</label><br>
                <input type="radio" id="Married" name="Marital_status" value="Married">
                <label for="Married">สมรส</label><br>
                <input type="radio" id="divorce" name="Marital_status" value="divorce">
                <label for="divorce">หย่า</label>
            </div>
            <br>

            <h1>ที่อยู่ปัจจุบัน</h1> 
            <div class="form-group"><!-- บ้านเลขที่ -->
                <label for="house_number" >บ้านเลขที่ <span class="required-asterisk">*</span> </label>
                <input type="text" id="house_number" name="house_number" required>
            </div>

            <div class="form-group"><!-- ซอย -->
                <label for="alley" >ซอย <span class="required-asterisk">*</span> </label>
                <input type="text" id="alley" name="alley"  required>
            </div>

            <div class="form-group"><!-- ถนน -->
                <label for="road" >ถนน <span class="required-asterisk">*</span> </label>
                <input type="text" id="road" name="road"  required>
            </div>

            <div class="form-group"><!-- ตำบล -->
                <label for="subdistrict" >ตำบล <span class="required-asterisk">*</span> </label>
                <input type="text" id="subdistrict" name="subdistrict"  required>
            </div>

            <div class="form-group"><!-- อำเภอ -->
                <label for="district" >อำเภอ <span class="required-asterisk">*</span> </label>
                <input type="text" id="district" name="district"  required>
            </div>

            <div class="form-group"><!-- จังหวัด -->
                <label for="province" >จังหวัด <span class="required-asterisk">*</span> </label>
                <input type="text" id="province" name="province"  required>
            </div>

            <div class="form-group"><!-- ประเทศ -->
                <label for="country" >ประเทศ <span class="required-asterisk">*</span> </label>
                <input type="text" id="country" name="country"  required>
            </div>

            <div class="form-group"><!-- ไปรษณีย์ -->
                <label for="postal" >ไปรษณีย์ <span class="required-asterisk">*</span> </label>
                <input type="text" id="postal" name="postal"  required>
            </div>

            <div class="form-group"><!-- เบอร์โทรศัพท์บ้าน -->
                <label for="home_phone_number" >เบอร์โทรศัพท์บ้าน <span class="required-asterisk">*</span> </label>
                <input type="text" id="home_phone_number" name="home_phone_number"  required>
            </div>
            <br>

            <h1>ที่อยู่ตามทะเบียนบ้าน</h1> 
            <div class="form-group"><!-- บ้านเลขที่ -->
                <label for="houregis_house_number" >บ้านเลขที่ <span class="required-asterisk">*</span> </label>
                <input type="text" id="houregis_house_number" name="houregis_house_number" required>
            </div>

            <div class="form-group"><!-- ซอย -->
                <label for="houregis_alley" >ซอย <span class="required-asterisk">*</span> </label>
                <input type="text" id="houregis_alley" name="houregis_alley"  required>
            </div>

            <div class="form-group"><!-- ถนน -->
                <label for="houregis_road" >ถนน <span class="required-asterisk">*</span> </label>
                <input type="text" id="houregis_road" name="houregis_road"  required>
            </div>

            <div class="form-group"><!-- ตำบล -->
                <label for="houregis_subdistrict" >ตำบล <span class="required-asterisk">*</span> </label>
                <input type="text" id="houregis_subdistrict" name="houregis_subdistrict"  required>
            </div>

            <div class="form-group"><!-- อำเภอ -->
                <label for="houregis_district" >อำเภอ <span class="required-asterisk">*</span> </label>
                <input type="text" id="houregis_district" name="houregis_district"  required>
            </div>

            <div class="form-group"><!-- จังหวัด -->
                <label for="houregis_province" >จังหวัด <span class="required-asterisk">*</span> </label>
                <input type="text" id="houregis_province" name="houregis_province"  required>
            </div>

            <div class="form-group"><!-- ประเทศ -->
                <label for="houregis_country" >ประเทศ <span class="required-asterisk">*</span> </label>
                <input type="text" id="houregis_country" name="houregis_country"  required>
            </div>

            <div class="form-group"><!-- ไปรษณีย์ -->
                <label for="houregis_postal" >ไปรษณีย์ <span class="required-asterisk">*</span> </label>
                <input type="text" id="houregis_postal" name="houregis_postal"  required>
            </div>

            <div class="form-group"><!-- เบอร์โทรศัพท์บ้าน -->
                <label for="houregis_home_phone_number" >เบอร์โทรศัพท์บ้าน <span class="required-asterisk">*</span> </label>
                <input type="text" id="houregis_home_phone_number" name="houregis_home_phone_number"  required>
            </div>

            <br>
            <h1>บุคคลที่ติดต่อได้ในกรณีเร่งด่วน</h1>
            <div class="form-group"><!-- name --> 
                <label for="person_urgent_cases_name" >ชื่อ  <span class="required-asterisk">*</span> </label>
                <input type="text" id="person_urgent_cases_name" name="person_urgent_cases_name" placeholder="ไม่ต้องกรอกคำนำหน้า" required>
            </div>

            <div class="form-group"><!-- กรอกนามสกุล -->
                <label for="person_urgent_cases_surname">นามสกุล  <span class="required-asterisk">*</span></label>
                <input type="text" id="person_urgent_cases_surname" name="person_urgent_cases_surname" required>
            </div>

            <div class="form-group"><!-- ความสัมพันธ์ -->
                <label for="person_urgent_cases_relationship">ความสัมพันธ์  <span class="required-asterisk">*</span></label>
                <input type="text" id="person_urgent_cases_relationship" name="person_urgent_cases_relationship" required>
            </div>

            <div class="form-group"><!-- บ้านเลขที่ -->
                <label for="person_urgent_cases_house_number" >บ้านเลขที่ <span class="required-asterisk">*</span> </label>
                <input type="text" id="person_urgent_cases_house_number" name="person_urgent_cases_house_number" required>
            </div>

            <div class="form-group"><!-- ซอย -->
                <label for="person_urgent_cases_alley" >ซอย <span class="required-asterisk">*</span> </label>
                <input type="text" id="person_urgent_cases_alley" name="person_urgent_cases_alley"  required>
            </div>

            <div class="form-group"><!-- ถนน -->
                <label for="person_urgent_cases_road" >ถนน <span class="required-asterisk">*</span> </label>
                <input type="text" id="person_urgent_cases_road" name="person_urgent_cases_road"  required>
            </div>

            <div class="form-group"><!-- ตำบล -->
                <label for="person_urgent_cases_subdistrict" >ตำบล <span class="required-asterisk">*</span> </label>
                <input type="text" id="person_urgent_cases_subdistrict" name="person_urgent_cases_subdistrict"  required>
            </div>

            <div class="form-group"><!-- อำเภอ -->
                <label for="person_urgent_cases_district" >อำเภอ <span class="required-asterisk">*</span> </label>
                <input type="text" id="person_urgent_cases_district" name="person_urgent_cases_district"  required>
            </div>

            <div class="form-group"><!-- จังหวัด -->
                <label for="person_urgent_cases_province" >จังหวัด <span class="required-asterisk">*</span> </label>
                <input type="text" id="person_urgent_cases_province" name="person_urgent_cases_province"  required>
            </div>

            <div class="form-group"><!-- ประเทศ -->
                <label for="person_urgent_cases_country" >ประเทศ <span class="required-asterisk">*</span> </label>
                <input type="text" id="person_urgent_cases_country" name="person_urgent_cases_country"  required>
            </div>

            <div class="form-group"><!-- ไปรษณีย์ -->
                <label for="person_urgent_cases_postal" >ไปรษณีย์ <span class="required-asterisk">*</span> </label>
                <input type="text" id="person_urgent_cases_postal" name="person_urgent_cases_postal"  required>
            </div>

            <div class="form-group"><!-- เบอร์โทรศัพท์บ้าน -->
                <label for="person_urgent_cases_home_phone_number" >เบอร์โทรศัพท์บ้าน <span class="required-asterisk">*</span> </label>
                <input type="text" id="person_urgent_cases_home_phone_number" name="person_urgent_cases_home_phone_number"  required>
            </div>

            <br>
            <h1>ประวัติการศึกษา</h1>
            <div class="form-group">
                <label for="educationLevel">ระดับการศึกษา</label>
                <input type="text" id="educationLevel" name="educationLevel" placeholder="ปริญญาตรี โท เอก">
            </div>

            <div class="form-group">
                <label for="institution">สถาบัน</label>
                <input type="text" id="institution" name="institution" placeholder="มหาวิทยาลัย">
            </div>

            <div class="form-group">
                <label for="faculty">คณะ</label>
                <input type="text" id="faculty" name="faculty" placeholder="คณะ">
            </div>

            <div class="form-group">
                <label for="major">สาขา</label>
                <input type="text" id="major" name="major" placeholder="สาขา">
            </div>

            <div class="form-group">
                <label for="grade">เกรด</label>
                <input type="text" id="grade" name="grade" placeholder="3.50">
            </div>

            <br>
            <h1>ประวัติการทำงาน</h1>
            <div class="form-group">
                <label for="startDate">ว.ด.ป. ที่เข้า</label>
                <input type="date" id="startDate" name="startDate">
            </div>

            <div class="form-group">
                <label for="startDate">ว.ด.ป. ที่ออก</label>
                <input type="date" id="endDate" name="endDate">
            </div>

            <div class="form-group">
                <label for="position">ตำแหน่ง</label>
                <input type="text" id="position" name="position" placeholder="Developer">
            </div>
            <div class="form-group">
                <label for="company">บริษัท / องค์กร</label>
                <input type="text" id="company" name="company" placeholder="BUU">
            </div>
            
            <br>
            <h1>ความสามารถพิเศษ</h1>
            <br>
            <h2>ภาษาต่างประเทศ</h2>
            <br>
            <div class="form-group">
                <label for="eng">ภาษาอังกฤษ</label>
                <input type="text" id="eng" name="eng" placeholder="สามารถฟัง และพูดดีมาก การอ่านปานกลาง การเขียนไม่ดี">
            </div>

            <div class="form-group">
                <label for="lang">ภาษาอื่นๆ</label>
                <input type="text" id="lang" name="lang" placeholder="ภาษาจีน สามารถฟัง และพูดดีมาก การอ่านปานกลาง การเขียนไม่ดี">
            </div>

            <br>
            <h2>คอมพิวเตอร์</h2>
            <br>
            <div class="form-group">
                <label for="com">ภาษาคอมพิวเตอร์ที่สามารถเขียนได้ ระบบ framework และอื่นๆ</label>
                <textarea id="com" name="com" placeholder="สามารถเขียนภาษา Java ได้ดี "></textarea>
            </div>
            <br>
            
            <button type="submit" name="action" value="save_database">ส่ง</button>
            <button type="submit" name="action" value="save_session" onclick="return validateForm()">บันทึก</button>
            
            <br>
            <br>
            <br>
        </form>
    </div>
</body>
</html>

<script> 
    const nameInput = document.getElementById('name');
    const surnameInput = document.getElementById('surname');
    const nicknameInput = document.getElementById('nickname');
    const birthdayInput = document.getElementById('birthday');
    const ethnicityInput = document.getElementById('ethnicity');
    const nationalityInput = document.getElementById('nationality');
    const religionInput = document.getElementById('religion');

    const house_numberInput = document.getElementById('house_number');
    const alleyInput = document.getElementById('alley');
    const roadInput = document.getElementById('road');
    const subdistrictInput = document.getElementById('subdistrict');
    const districtInput = document.getElementById('district');
    const provinceInput = document.getElementById('province');
    const countryInput = document.getElementById('country');
    const postalInput = document.getElementById('postal');
    const home_phone_numberInput = document.getElementById('home_phone_number');

    const houregis_house_numberInput = document.getElementById('houregis_house_number');
    const houregis_alleyInput = document.getElementById('houregis_alley');
    const houregis_roadInput = document.getElementById('houregis_road');
    const houregis_subdistrictInput = document.getElementById('houregis_subdistrict');
    const houregis_districtInput = document.getElementById('houregis_district');
    const houregis_provinceInput = document.getElementById('houregis_province');
    const houregis_countryInput = document.getElementById('houregis_country');
    const houregis_postalInput = document.getElementById('houregis_postal');
    const houregis_home_phone_numberInput = document.getElementById('houregis_home_phone_number');

    const person_urgent_cases_nameInput = document.getElementById('person_urgent_cases_name');
    const person_urgent_cases_surnameInput = document.getElementById('person_urgent_cases_surname');
    const person_urgent_cases_relationshipInput = document.getElementById('person_urgent_cases_relationship');
    const person_urgent_cases_house_numberInput = document.getElementById('person_urgent_cases_house_number');
    const person_urgent_cases_alleyInput = document.getElementById('person_urgent_cases_alley');
    const person_urgent_cases_roadInput = document.getElementById('person_urgent_cases_road');
    const person_urgent_cases_subdistrictInput = document.getElementById('person_urgent_cases_subdistrict');
    const person_urgent_cases_districtInput = document.getElementById('person_urgent_cases_district');
    const person_urgent_cases_provinceInput = document.getElementById('person_urgent_cases_province');
    const person_urgent_cases_countryInput = document.getElementById('person_urgent_cases_country');
    const person_urgent_cases_postalInput = document.getElementById('person_urgent_cases_postal');
    const person_urgent_cases_home_phone_numberInput = document.getElementById('person_urgent_cases_home_phone_number');

    function validateForm() { 
        
        //const Input = document.getElementById('');

        nameInput.required = false;
        surnameInput.required = false;
        nicknameInput.required = false;
        birthdayInput.required = false;
        ethnicityInput.required = false;
        nationalityInput.required = false;
        religionInput.required = false;

        house_numberInput.required = false;
        alleyInput.required = false;
        roadInput.required = false;
        subdistrictInput.required = false;
        districtInput.required = false;
        provinceInput.required = false;
        countryInput.required = false;
        postalInput.required = false;
        home_phone_numberInput.required = false;

        houregis_house_numberInput.required = false;
        houregis_alleyInput.required = false;
        houregis_roadInput.required = false;
        houregis_subdistrictInput.required = false;
        houregis_districtInput.required = false;
        houregis_provinceInput.required = false;
        houregis_countryInput.required = false;
        houregis_postalInput.required = false;
        houregis_home_phone_numberInput.required = false;


        person_urgent_cases_nameInput.required = false;
        person_urgent_cases_surnameInput.required = false;
        person_urgent_cases_relationshipInput.required = false;
        person_urgent_cases_house_numberInput.required = false;
        person_urgent_cases_alleyInput.required = false;
        person_urgent_cases_roadInput.required = false;
        person_urgent_cases_subdistrictInput.required = false;
        person_urgent_cases_districtInput.required = false;
        person_urgent_cases_provinceInput.required = false;
        person_urgent_cases_countryInput.required = false;
        person_urgent_cases_postalInput.required = false;
        person_urgent_cases_home_phone_numberInput.required = false;
        //.required = false;
        return storageFunction();
        
    }//เพิ่มข้อมูล
    function storageFunction() {
        
        const name = nameInput.value ;
        const surname = surnameInput.value ;
        const nickname = nicknameInput.value ;
        const birthday = birthdayInput.value ;
        const ethnicity = ethnicityInput.value ;
        const nationality = nationalityInput.value ;
        const religion = religionInput.value ;
        localStorage.setItem('name', name);
        localStorage.setItem('surname', surname);
        localStorage.setItem('nickname', nickname);
        localStorage.setItem('birthday', birthday);
        localStorage.setItem('ethnicity', ethnicity);
        localStorage.setItem('nationality', nationality);
        localStorage.setItem('religion', religion);

        const house_number = surnameInput.value ;
        const alley = surnameInput.value ;
        const road = surnameInput.value ;
        const subdistrict = surnameInput.value ;
        const district = surnameInput.value ;
        const province = surnameInput.value ;
        const country = surnameInput.value ;
        const postal = surnameInput.value ;
        const home_phone_number = surnameInput.value ;
        localStorage.setItem('house_number', house_number);
        localStorage.setItem('alley', alley);
        localStorage.setItem('road', road);
        localStorage.setItem('subdistrict', subdistrict);
        localStorage.setItem('district', district);
        localStorage.setItem('province', province);
        localStorage.setItem('country', country);
        localStorage.setItem('postal', postal);
        localStorage.setItem('home_phone_number', home_phone_number);


        const houregis_house_number = houregis_house_numberInput.value ;
        const houregis_alley = houregis_alleyInput.value ;
        const houregis_road = houregis_roadInput.value ;
        const houregis_subdistrict = houregis_subdistrictInput.value ;
        const houregis_district = houregis_districtInput.value ;
        const houregis_province = houregis_provinceInput.value ;
        const houregis_country = houregis_countryInput.value ;
        const houregis_postal = houregis_postalInput.value ;
        const houregis_home_phone_number = houregis_home_phone_numberInput.value ;

        localStorage.setItem('houregis_house_number', houregis_house_number);
        localStorage.setItem('houregis_alley', houregis_alley);
        localStorage.setItem('houregis_road', houregis_road);
        localStorage.setItem('houregis_subdistrict', houregis_subdistrict);
        localStorage.setItem('houregis_district', houregis_district);
        localStorage.setItem('houregis_province', houregis_province);
        localStorage.setItem('houregis_country', houregis_country);
        localStorage.setItem('houregis_postal', houregis_postal);
        localStorage.setItem('houregis_home_phone_number', houregis_home_phone_number);

        alert("ฟอร์มของคุณถูกบันทึกเรียบร้อย") ;

        
    }

    function loadData() {
    
        const storedName = localStorage.getItem('name');
        const storedSurname = localStorage.getItem('surname');
        const storedNickname = localStorage.getItem('nickname');
        const storedBirthday = localStorage.getItem('birthday');
        const storedEthnicity = localStorage.getItem('ethnicity');
        const storednationality = localStorage.getItem('nationality');
        const storedreligion = localStorage.getItem('religion');

        const storedhouse_number = localStorage.getItem('house_number');
        const storedalley = localStorage.getItem('alley');
        const storedroad = localStorage.getItem('road');
        const storedsubdistrict = localStorage.getItem('subdistrict');
        const storeddistrict = localStorage.getItem('district');
        const storedprovince = localStorage.getItem('province');
        const storedcountry = localStorage.getItem('country');
        const storedpostal = localStorage.getItem('postal');
        const storedhome_phone_number = localStorage.getItem('home_phone_number');

        nameInput.value = storedName;
        surnameInput.value = storedSurname;
        nicknameInput.value = storedNickname;
        birthdayInput.value = storedBirthday;
        ethnicityInput.value = storedEthnicity;
        nationalityInput.value = storednationality;
        religionInput.value = storedreligion;
    
}


</script>
<script>
    window.onload = loadData;
</script>


