<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">

</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('image/clicknext_logo.png') }}" alt="Clicknext Logo"> 
        </div>
        <div> 
            <hr width="90%" color="Black" />
        </div>
        <form action="/form" method="POST">
            @csrf
            <div class="form-group">
                <label for="province">ตำแหน่งงาน <span class="required-asterisk">*</span> </label>
                <select name="job" id="worktest" placeholder="เลือกตำแหน่งงาน" > <!-- link ข้อมูล database -->
                    <option value="jobname">Devlopment</option>
                    <option value="jobname">jobname</option>
                    
                </select>
            </div>

            <div class="form-group"> <!-- กรอกชื่อ -->
                <label for="name" >ชื่อ (Name) <span class="required-asterisk">*</span> </label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group"><!-- กรอกนามสกุล -->
                <label for="surname">นามสกุล (Surname) <span class="required-asterisk">*</span></label>
                <input type="text" id="surname" name="surname" required>
            </div>

            <div class="form-group"><!-- กรอกอายุ -->
                <label for="age">อายุ (Age) <span class="required-asterisk">*</span></label>
                <input type="number" id="age" name="age" required>
            </div>

            <div class="form-group"><!-- กรอกเบอร์ -->
                <label for="phone_number">เบอร์โทรศัพท์ (Moblie Number) <span class="required-asterisk">*</span></label>
                <input type="tel" id="phone_number" name="phone_number" placeholder="0123456789" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
            </div>

            <div class="form-group"><!-- กรอกเมล -->
                <label for="email">อีเมล (Email) <span class="required-asterisk">*</span> </label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group"><!-- กรอกมหาลัย -->
                <label for="university">จบการศึกษาจากมหาวิทยาลัย (Graduated from university) <span class="required-asterisk">*</span> </label>
                <input type="text" id="university" name="university" required>
            </div>

            <div class="form-group"><!-- กรอกคณะ-->
                <label for="faculty">คณะ (Faculty) <span class="required-asterisk">*</span> </label>
                <input type="text" id="faculty" name="faculty" required>
            </div>

            <div class="form-group"><!-- กรอกสาขา-->
                <label for="field">สาขา (Field)<span class="required-asterisk">*</span> </label>
                <input type="text" id="Field" name="Field" required>
            </div>

            <div class="form-group"><!-- กรอกเงินเดือนที่ต้องการ-->
                <label for="desired_salary">เงินเดือนที่ต้องการ (Desired salary) <span class="required-asterisk">*</span> </label>
                <input type="number" id="desired_salary" name="desired_salary" required>
            </div>

            <div class="form-group"><!-- กรอกส่งที่คิดว่าเหมาะสม-->
                <label for="question">ทำไมเราถึงต้องเลือกคุณ (Why should we choose you?) <span class="required-asterisk">*</span> </label>
                <input type="text" id="question" name="question" required>
            </div>

            <div class="form-group"><!-- Resume -->
                <label for="resume">Resume  </label>
                <input type="file" id="resume" name="resume" >
            </div>

            <div class="form-group"><!-- accept -->
            <input type="checkbox" id="accept" name="accept" required >
            <label for="accept">ฉันยอมรับ <a href="">นโยบายส่วนบุคคล</a> </label>
            </div>

            <button type="submit">ส่ง</button>

            

        </form>
    </div>
</body>
</html>
