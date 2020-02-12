<?php
use App\Presensi;
use App\User;

function totalMesin()
{
	return Presensi::count();
}

function totalPengguna()
{
	return User::count();
}