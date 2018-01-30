<html>
<form method="post" action="/people">
    <input type="text" name="firstName" placeholder="First name">
    <input type="text" name="lastName" placeholder="Last name">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" value="Search">
</form>
<?php if(isset($ppl)) { ?>
@foreach($ppl as $d)
{{$d->staffid}}
{{$d->name}}
@endforeach
<?php } ?>

</html>