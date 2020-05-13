
SELECT `tbl_cuti`.`id_cuti` AS `id_cuti`,
`tbl_cuti`.`NIK` AS `NIK`,
`v_karyawan`.`nm_karyawan` AS `nm_karyawan`,
`tbl_cuti`.`id_jc` AS `id_jc`,
`tbl_jc`.`nm_jc` AS `nm_jc`,
`tbl_cuti`.`tgl_pengajuan` AS `tgl_pengajuan`,
`tbl_cuti`.`tgl_mulai` AS `tgl_mulai`,
`tbl_cuti`.`tgl_selesai` AS `tgl_selesai`,
TO_DAYS(`tbl_cuti`.`tgl_selesai`) - TO_DAYS(`tbl_cuti`.`tgl_mulai`) + 1 AS `lama_cuti`,
`tbl_cuti`.`ket` AS `ket`,
`tbl_cuti`.`stt_cuti` AS `stt_cuti` FROM ((`tbl_cuti` JOIN `v_karyawan`) JOIN `tbl_jc`) WHERE `tbl_cuti`.`NIK` = `v_karyawan`.`NIK` AND `tbl_cuti`.`id_jc` = `tbl_jc`.`id_jc`