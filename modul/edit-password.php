<?php
error_reporting(0);
session_start();
include("../config/koneksi.php");
$r = mysqli_query($conn, "select *from pengelola where username = '$_SESSION[username]'");
$t = mysqli_fetch_array($r);
echo"
<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                    <div class='form-element-list'>
                       <div class='cmp-tb-hd bcs-hd'>
                            <h2>Ganti Password</h2>
                        </div>
						<form method='POST' action='modul/act_editpass.php'>
						 <input type='hidden' class='form-control' value='$t[kode_pengelola]' name='id_user'>
                        <div class='row'>
                            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class='form-group ic-cmp-int'>
                                    <div class='form-ic-cmp'>
                                        <i class='notika-icon notika-support'></i>
                                    </div>
                                    <div class='nk-int-st'>
                                        <input type='text' class='form-control' placeholder='Username' value='$t[username]' disabled=''>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class='row'>
                            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class='form-group ic-cmp-int'>
                                    <div class='form-ic-cmp'>
                                        <i class='notika-icon notika-support'></i>
                                    </div>
                                    <div class='nk-int-st'>
                                        <input type='text' class='form-control' placeholder='Full Name' value='$t[fullname]' name='fullname'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                           <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class='form-group ic-cmp-int'>
                                    <div class='form-ic-cmp'>
                                        <i class='notika-icon notika-map'></i>
                                    </div>
                                    <div class='nk-int-st'>
                                        <input type='password' class='form-control' placeholder='Password' value='$t[password]' name='password'>
                                    </div>
                                </div>
                            </div>
                        </div>
						<p align='right'><button type='submit' class='btn btn-success notika-btn-success'>Update</button></p>
						</form>
                    </div>
                </div>
				";
				?>