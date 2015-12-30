<input type="email" name="email" required value="<?php if(isset($user)){echo $user->email;}?>"/>
<input type="text" name="name" required  value="<?php if(isset($user)){echo $user->name;} ?>"/>
<input type="password" name="password" />
<select name="rol" id="rol">
    <option value="1">Admin</option>
    <option value="2">Moderador</option>
    <option value="3">Usuario</option>
</select>