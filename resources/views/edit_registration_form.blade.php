@foreach ($reg_data as $r1)
    @php
        $h = explode(',', $r1['hobbies']);
    @endphp
    <form action="{{ URL::to('/') }}/Update_registration" method="post" enctype="multipart/form-data">
        @csrf
        Enter Name: <input type="text" name="fn" id="fn1" value="{{ $r1['fullname'] }}">
        <br>
        <span style="color:red">
            @error('fn')
                {{ $message }}
            @enderror
        </span>
        <br>
        Enter Email: <input type="email" name="em" id="em1" value="{{ $r1['email'] }}" readonly>
        <br>
        <span style="color:red">
            @error('em')
                {{ $message }}
            @enderror
        </span>
        <br>
        Enter Password: <input type="password" name="pwd" id="pwd1" value="{{ $r1['password'] }}">
        <br>
        <span style="color:red">
            @error('pwd')
                {{ $message }}
            @enderror
        </span>
        <br>
        Enter Confirm Password: <input type="password" name="pwd_confirmation" id="cpwd1"
            value="{{ $r1['password'] }}">
        <br>
        <span style="color:red">
            @error('pwd_confirmation')
                {{ $message }}
            @enderror
        </span>
        <br>
        Enter Age: <input type="number" name="age" id="age1" value="{{ $r1['age'] }}">
        <br>
        <span style="color:red">
            @error('age')
                {{ $message }}
            @enderror
        </span>
        <br>
        Enter Mobile Number: <input type="tel" name="mobile" id="mobile" value="{{ $r1['mobile'] }}"">
        <br>
        <span style="color:red">
            @error('mobile')
                {{ $message }}
            @enderror
        </span>
        <br>
        Select Gender: <input type="radio" name="gender" id="gender1" value="Male"
            @if ($r1['gender'] == 'Male') checked @endif /> Male
        <input type="radio" name="gender" id="gender2" value="Female"
            @if ($r1['gender'] == 'Female') checked @endif /> Female
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
            @if (is_array($h) && in_array('Playing Sports', $h)) checked @endif />Playing Sports
        <br>
        <input type="checkbox" name="hobby[]" id="hobby1" value="Reading"
            @if (is_array($h) && in_array('Reading', $h)) checked @endif />Reading
        <br>
        <input type="checkbox" name="hobby[]" id="hobby1" value="Cooking"
            @if (is_array($h) && in_array('Cooking', $h)) checked @endif />Cooking
        <br>
        <span style="color:red">
            @error('hobby')
                {{ $message }}
            @enderror
        </span>
        <br>
        Select your Qualification:
        <select name="qualification" id="qualification1">
            <option value="Under Graduate" @if ($r1['qualification'] == 'Under Graduate') selected @endif>Under Graduate</option>
            <option value="Graduate" @if ($r1['qualification'] == 'Graduate') selected @endif>Graduate</option>

            <option value="Post Graduate" @if ($r1['qualification'] == 'Post Graduate') selected @endif>Graduate</option>
            <option value="Doctorate" @if ($r1['qualification'] == 'Doctorate') selected @endif>Doctorate</option>
            <option value="Post Doctorate" @if ($r1['qualification'] == 'Post Doctorate') selected @endif>Post Doctorate</option>

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
{{ $r1['address'] }}
        </textarea>
        <br>
        <span style="color:red">
            @error('address')
                {{ $message }}
            @enderror
        </span>
        <br>
        <img src="{{ URL::to('/') }}/images/profile_pictures/{{ $r1['pic'] }}" height="150px" width="250px" />
        <br>
        Select Profile Picture: <input type="file" name="pic" id="pic1">
        <br>
        <span style="color:red">
            @error('pic')
                {{ $message }}
            @enderror
        </span>
        <br>
        <input type="submit" value="Update" name="reg" id="reg1">
    </form>
@endforeach
