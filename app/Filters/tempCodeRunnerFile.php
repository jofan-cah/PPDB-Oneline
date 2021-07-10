<?php
if (session()->get('level') == '') {
			return redirect()->to('/');
		}