blockviewed
UPDATE `ps_hook_module`
SET id_hook = (SELECT id_hook FROM `ps_hook` WHERE name='displayBheadBtm' LIMIT 1)
WHERE id_hook = (SELECT id_hook FROM `ps_hook` WHERE name='displayMainBtm' LIMIT 1)
AND id_module = (SELECT id_module FROM `ps_module` WHERE name='blockviewed' LIMIT 1) LIMIT 1;



blocktopmenu
UPDATE `ps_hook_module`
SET id_hook = (SELECT id_hook FROM `ps_hook` WHERE name='top' LIMIT 1), position=9
WHERE id_hook = (SELECT id_hook FROM `ps_hook` WHERE name='displayBheadBtm' LIMIT 1)
AND id_module = (SELECT id_module FROM `ps_module` WHERE name='blocktopmenu' LIMIT 1) LIMIT 1;



blocktopmenu
UPDATE `ps_hook_module`
SET id_hook = (SELECT id_hook FROM `ps_hook` WHERE name='displayBheadBtm' LIMIT 1), position=1
WHERE id_hook = (SELECT id_hook FROM `ps_hook` WHERE name='top' LIMIT 1)
AND id_module = (SELECT id_module FROM `ps_module` WHERE name='blocktopmenu' LIMIT 1) LIMIT 1;



homefeatured
UPDATE `ps_hook_module`
SET id_hook = (SELECT id_hook FROM `ps_hook` WHERE name='displayMainBtm' LIMIT 1)
WHERE id_hook = (SELECT id_hook FROM `ps_hook` WHERE name='home' LIMIT 1)
AND id_module = (SELECT id_module FROM `ps_module` WHERE name='homefeatured' LIMIT 1) LIMIT 1;

	function hookDisplayMainBtm($params)
	{
		return $this->hookHome($params);
	}



editorial
UPDATE `ps_hook_module`
SET id_hook = (SELECT id_hook FROM `ps_hook` WHERE name='displayMainBtm' LIMIT 1)
WHERE id_hook = (SELECT id_hook FROM `ps_hook` WHERE name='home' LIMIT 1)
AND id_module = (SELECT id_module FROM `ps_module` WHERE name='editorial' LIMIT 1) LIMIT 1;

	function hookDisplayMainBtm($params)
	{
		return $this->hookHome($params);
	}