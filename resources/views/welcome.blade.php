<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>Form Condidat</title>
    <style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
   
}

.div-to-center {
    margin: 0 auto;
    text-align: center;
}

.card {
    background-color: black;
    color: white;
    padding: 40px;
    margin : 20px;
    width : 400px ;
    /* height: 400px; */
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.2);
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 6px;
}

input[type="text"],
input[type="email"],
textarea,
input[type="file"] {
    width: 100%;
    padding: 10px;
    background-color: white;
    border: none;
    border-radius: 4px;
}

button[type="submit"] {
    background-color: #ff3399;
    color: white;
    padding: 10px 20px;
    width: 100%;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}
a{
    background-color: #E35ECF;
    color: white;
    
    padding: 10px 20px;
    width: 100%;
    border: none;
    border-radius: 4px;
    text-decoration: none; 
    cursor: pointer;
    transition: background-color 0.3s;
}
button[type="submit"]:hover {
    background-color:	#C71585   ; 
}
.alert-success {
    background-color: #4CAF50; 
    color: #fff;
    width: 100%;
    padding: 10px;
    border-radius: 5px; 
    text-align: center; 
    font-size: 16px; 
    font-weight: bold; 
}
</style>
</head>
<body>
    
    <div class="cardd">
    <div class="card">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
<form id="contact-form" enctype="multipart/form-data" action="{{ route('submit.form') }}" method="post">
    @csrf
    <div class="form-group">
        <input placeholder="First Name" type="text" id="first-name" name="first_name" required>
        @error('first-name')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <input placeholder="Last Name" type="text" id="last-name" name="last_name" required>
        @error('last-name')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <input placeholder="Email" type="email" id="email" name="email" required>
        @error('email')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <textarea id="about-you" placeholder="About You" name="about_you" rows="4" required></textarea>
        @error('about-you')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <input type="file" style="background-color: black; border: 1px solid white; color: white;" placeholder="Upload Resume" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
        @error('resume')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" id="submit-button">Submit</button>
    </div>

    
</form>


    </div>
    <div class="row">
    <div class="div-to-center">
        <a href="{{ route('data.index') }}" class="col-sm-6">Display Candidate Data</a>
    </div>
    </div>

    </div>
</body>



</html>
