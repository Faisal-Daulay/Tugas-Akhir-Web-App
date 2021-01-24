
<div class="row">
    <div class="col-md-12">
        <form action="?page=user/pro_edit.php" method="post" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">FORM User</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                            
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span> Refresh</a></li>
                            </ul>                                        
                        </li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">
                            <h2 class="text-uppercase"> User</h2>
                        </label>
                    </div>  
                    <?php
                        include '../include/config.php';
                        
                        $id = $_REQUEST['id'];
                        $sql = "SELECT * FROM users WHERE id_user=:id_user ";
                        $query = $db -> prepare($sql);
                        $query -> execute(array(':id_user' => $id));
                        $no=1;
                        while ($ambil = $query -> fetch(PDO::FETCH_ASSOC)) {
                            $id_user = $ambil['id_user'];
                            $user = $ambil['username'];
                            $naleng = $ambil['naleng'];
                            $pass = $ambil['password'];
                            $status_user = $ambil['status_user'];
                    ?>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <input type="hidden" name="id" class="form-control" value="<?= $id_user?>"/>
                                <input type="text" name="naleng" class="form-control" value="<?= $naleng?>"/>
                            </div>                                            
                            <span class="help-block">This is sample of text field</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Username</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-user"></span></span>
                                <input type="text" name="user" class="form-control" value="<?= $user ?>"/>
                            </div>                                            
                            <span class="help-block">This is sample of text field</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Password</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-lock"></span></span>
                                <input type="password" name="pass" class="form-control"  value="<?= $pass ?>" />
                            </div>                                            
                            <span class="help-block">This is sample of text field</span>
                        </div>
                    </div>

                    <?php } ?>

                </div>  
                <div class="panel-footer">
                    <button type="reset" class="btn btn-primary pull-left" onclick=self.history.back()>Kembali</button>
                    <button type="submit" class="btn btn-primary pull-right">Simpan Data</button>
                </div>                            
            </div>
        </form>            
    </div>
</div>    