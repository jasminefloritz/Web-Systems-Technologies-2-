@php
     $name = "Floritz Jasmine Dumpit";
    $gender = "Female"; 
    $age = 22; 
    $dob = "04/23/2003";
    $pob = "Mapandan Community Hospital,Mapandan, Pangasinan, Philippines";
    $residence = "Manaoag, Pangasinan, Philippines";
    $nationality = "Filipino";
    $religion = "Roman Catholic";
    $zodiac = "Taurus";
    $height = "160cm";
    $weight = "70kg";
    $education = "Bachelor of Science in Information Technology";
    $occupation = "Fresh Graduate";
    $languages = "English, Tagalog, Pangasinan";

  $age_ext = "";
    if ($age == 21) {
        $age_ext = " (Dalawampu't Isa)";
    } elseif ($age >= 22 && $age <= 23) {
        $age_ext = " (Duapulo ket dua)"; 
    } elseif ($age > 24) {
        $age_ext = " (Duapulo tan pito)"; 
    }

@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata - {{ $name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #4b5563; font-family: 'Arial', sans-serif; display: flex; justify-content: center; padding: 40px 0; }
        .document-canvas { width: 750px; background-color: #dae5e8; box-shadow: 0 0 20px rgba(0,0,0,0.5); }
        .teal-header { background-color: #4a8694; padding: 30px; display: flex; color: white; }
        .photo-frame { width: 220px; height: 280px; background: white; padding: 8px; box-shadow: 2px 2px 8px rgba(0,0,0,0.2); flex-shrink: 0; }
        .header-info { margin-left: 30px; }
        .header-info h1 { font-size: 32px; font-weight: bold; margin-bottom: 15px; }
        .header-info p { font-size: 14px; margin-bottom: 2px; }
        .label { font-weight: bold; }
        

        .section-container { padding: 25px 40px; }
        .section-title { 
            font-size: 18px; 
            font-weight: bold; 
            color: #333; 
            margin-bottom: 15px; 
            width: 35%; /
            border-bottom: 1px solid #b2c9ce; 
            padding-bottom: 4px;
        }
        .section-content { font-size: 13.5px; color: #333; line-height: 1.6; margin-bottom: 20px; }
        .family-grid p { margin-bottom: 2px; }
    </style>
</head>
<body>

    <div class="document-canvas">
        <div class="teal-header">
            <div class="photo-frame">
                <img src="{{ asset('asset/profile.jpg') }}" alt="Profile" class="w-full h-full object-cover border border-gray-300">
            </div>
            <div class="header-info">
                <h1>{{ $name }}</h1>
                <p><span class="label">Age:</span> {{ $age }}{{ $age_ext }}</p>
                <p><span class="label">Date and time of birth:</span> {{ $dob }}</p>
                <p><span class="label">Place of birth:</span> {{ $pob }}</p>
                <p><span class="label">Place of residence:</span> {{ $residence }}</p>
                <p><span class="label">Nationality:</span> {{ $nationality }}</p>
                <p><span class="label">Religion:</span> {{ $religion }}</p>
                <p><span class="label">Zodiac:</span> {{ $zodiac }}</p>
                <p><span class="label">Height:</span> {{ $height }}</p>
                <p><span class="label">Weight:</span> {{ $weight }}</p>
                <p><span class="label">Education:</span> {{ $education }}</p>
                <p><span class="label">Occupation:</span> {{ $occupation }}</p>
                <p><span class="label">Languages:</span> {{ $languages }}</p>
            </div>
        </div>

        <div class="section-container">
            <div class="section-title">About Me</div>
            <div class="section-content">
             I graduated from Pangasinan State University – Urdaneta Campus with a Bachelor of Information Technology, major in Web and Mobile Technologies. I’m passionate about UI/UX design and enjoy creating intuitive interfaces in Figma, as well as developing mobile applications using Flutter. I like turning ideas into practical and user-focused solutions. While I’m naturally quiet and shy, I collaborate well with others and value teamwork, growth, and continuous learning. </div>

            <div class="section-title">Family Background</div>
            <div class="section-content family-grid">
                <p><span class="label">Father's Name:</span> Froilan Dumpit</p>
                <p><span class="label">Father's Profession:</span> Landscaper</p>
                <p><span class="label">Mother's Name:</span> Li Salinas</p>
                <p><span class="label">Mother's Profession:</span> Businesswoman</p>
                <p><span class="label">No. of Brothers:</span> 2</p>
                <p><span class="label">No. of Sisters:</span> 2</p>
                <p><span class="label">Family Type:</span> Nuclear</p>
                <p><span class="label">Social Class:</span> Average</p>
                <p><span class="label">Place of Residence:</span> {{ $residence }}</p>
            </div>

            <div class="section-title">Expectations</div>
            <div class="section-content">
                I aim to further develop my skills in graphic design and UI/UX design while gaining real-world industry experience. Through this opportunity, I expect to strengthen my design foundation, learn industry standards and workflows, and prepare myself for a future career as a graphic designer or UI/UX designer.
                <br><br>
                <div class="section-title">Contact Details</div>
            <div class="section-content">
                <p><span class="label">Phone Number:</span> +63 912 345 6789</p>
                <p><span class="label">Residence Address:</span> {{ $residence }}, Philippines</p>
            </div>
        </div>
    </div>

</body>
</html>