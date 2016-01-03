<input type="email" name="email" placeholder="Email" required value="<?php if(isset($user)){echo $user->email;}?>"/>
<input type="text" name="name" placeholder="Name" required  value="<?php if(isset($user)){echo $user->name;} ?>"/>
<input type="password" name="password" placeholder="Password"/>
<select name="rol" id="rol">
    <option value="1">Admin</option>
    <option value="2">Moderador</option>
    <option value="3">Usuario</option>
</select>