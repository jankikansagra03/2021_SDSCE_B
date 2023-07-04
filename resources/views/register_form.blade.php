<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="FetchRegister" method="post" enctype="multipart/form-data">
        @csrf
        Enter Name: <input type="text" name="fn" id="fn1" value="{{ old('fn') }}">
        <br>
        <span style="color:red">
            @error('fn')
                {{ $message }}
            @enderror
        </span>
        <br>
        Enter Email: <input type="email" name="em" id="em1" value="{{ old('em') }}">
        <br>
        <span style="color:red">
            @error('em')
                {{ $message }}
            @enderror
        </span>
        <br>
        Enter Password: <input type="password" name="pwd" id="pwd1" value="{{ old('pwd') }}">
        <br>
        <span style="color:red">
            @error('pwd')
                {{ $message }}
            @enderror
        </span>
        <br>
        Enter Confirm Password: <input type="password" name="pwd_confirmation" id="cpwd1"
            value="{{ old('pwd_confirmation') }}">
        <br>
        <span style="color:red">
            @error('pwd_confirmation')
                {{ $message }}
            @enderror
        </span>
        <br>
        Enter Age: <input type="number" name="age" id="age1" value="{{ old('age') }}">
        <br>
        <span style="color:red">
            @error('age')
                {{ $message }}
            @enderror
        </span>
        <br>
        Enter Mobile Number: <input type="tel" name="mobile" id="mobile" value="{{ old('mobile') }}"">
        <br>
        <span style="color:red">
            @error('mobile')
                {{ $message }}
            @enderror
        </span>
        <br>
        Select Gender: <input type="radio" name="gender" id="gender1" value="Male"
            @if (old('gender') == 'Male') checked @endif /> Male
        <input type="radio" name="gender" id="gender2" value="Female"
            @if (old('gender') == 'Female') checked @endif /> Female
        <br>
        <span style="color:red">
            @error('gender')
                {{ $message }}
            @enderror
        </span>
        <br>
        Select your Hobby:
        <br>
        <input type="checkbox" name="hobby[]" id="hobby1" value="Playing Sports"
            @if (is_array(old('hobby')) && in_array('Playing Sports', old('hobby'))) checked @endif />Playing Sports
        <br>
        <input type="checkbox" name="hobby[]" id="hobby1" value="Reading"
            @if (is_array(old('hobby')) && in_array('Reading', old('hobby'))) checked @endif />Reading
        <br>
        <input type="checkbox" name="hobby[]" id="hobby1" value="Cooking"
            @if (is_array(old('hobby')) && in_array('Cooking', old('hobby'))) checked @endif />Cooking
        <br>
        <span style="color:red">
            @error('hobby')
                {{ $message }}
            @enderror
        </span>
        <br>
        Select your Qualification:
        <select name="qualification" id="qualification1">
            <option value="Under Graduate" @if (old('qualification') == 'Under Graduate') selected @endif>Under Graduate</option>
            <option value="Graduate" @if (old('qualification') == 'Graduate') selected @endif>Graduate</option>

            <option value="Post Graduate" @if (old('qualification') == 'Post Graduate') selected @endif>Graduate</option>
            <option value="Doctorate" @if (old('qualification') == 'Doctorate') selected @endif>Doctorate</option>
            <option value="Post Doctorate" @if (old('qualification') == 'Post Doctorate') selected @endif>Post Doctorate</option>

        </select>
        <br>
        <span style="color:red">
            @error('qualification')
                {{ $message }}
            @enderror
        </span>
        <br>
        Enter Your address
        <textarea name="address" id="address1">

        </textarea>
        <br>
        <span style="color:red">
            @error('address')
                {{ $message }}
            @enderror
        </span>
        <br>
        Select Profile Picture: <input type="file" name="pic" id="pic1">
        <br>
        <span style="color:red">
            @error('pic')
                {{ $message }}
            @enderror
        </span>
        <br>
        <input type="submit" value="Register" name="reg" id="reg1">
    </form>
</body>

</html>
