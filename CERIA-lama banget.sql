CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `nomor_induk` varchar(255),
  `email` varchar(255) UNIQUE,
  `email_verified_at` datetime,
  `password` varchar(255),
  `remember_token` varchar(255),
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `assignment` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `description` varchar(255),
  `date_created` date,
  `due_date` date,
  `user_update` int,
  `date_update` date,
  `id_teacher` varchar(255),
  `isVisible` boolean
);

CREATE TABLE `attendance` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_class` int,
  `nomor_induk` varchar(255),
  `tanggal` date,
  `status_kehadiran` varchar(255),
  `deskripsi` varchar(255)
);

CREATE TABLE `bulletin` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `update_date` date,
  `approval_date` date,
  `title` varchar(255),
  `content` longtext,
  `user_update` int,
  `isApproved` boolean,
  `comment` longtext,
  `thumbnail` varchar(255)
);

CREATE TABLE `child` (
  `nomor_induk` varchar(255) PRIMARY KEY,
  `nik_parent` varchar(255),
  `id_kelas` int,
  `nama` varchar(255),
  `notification_token` varchar(255)
);

CREATE TABLE `discussion` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `message` varchar(255),
  `date_created` date,
  `username` varchar(255),
  `name` varchar(255),
  `id_kelas` int,
  `id_assignment` int
);

CREATE TABLE `document` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `location` varchar(255),
  `date_modified` date,
  `user_upload` int,
  `type` varchar(255),
  `id_event` int,
  `id_submission` int,
  `id_assignment` int,
  `id_bulletin` int
);

CREATE TABLE `event` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `id_class` int,
  `description` varchar(255),
  `location` varchar(255),
  `date` date
);

CREATE TABLE `file` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `path` varchar(255),
  `date_upload` datetime,
  `user_upload` int,
  `id_folder` int
);

CREATE TABLE `folder` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `description` varchar(255),
  `date_created` date,
  `user_create` int
);

CREATE TABLE `grade` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_indicator` int,
  `id_submission` int
);

CREATE TABLE `group_chat` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `text` varchar(255),
  `date` date,
  `id_sender` int,
  `name` varchar(255),
  `id_class` int
);

CREATE TABLE `indicator` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `description` varchar(255)
);

CREATE TABLE `class` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `kelas` varchar(255),
  `thn_akademik` varchar(255),
  `status` boolean,
  `nomor_pegawai` varchar(255),
  `foto` varchar(255),
  `deskripsi` varchar(255),
  `periode_awal` varchar(255),
  `periode_akhir` varchar(255)
);

CREATE TABLE `class_assignment` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_class` int,
  `id_assignment` int
);

CREATE TABLE `class_event` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_class` int,
  `id_event` int,
  `tanggal` date,
  `waktu` time
);

CREATE TABLE `parent` (
  `nik` varchar(255) PRIMARY KEY,
  `username` varchar(255),
  `password` varchar(255),
  `nama` varchar(255)
);

CREATE TABLE `raport` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nilai` double,
  `date_created` date,
  `nis` varchar(255),
  `id_tema` int,
  `id_subtema` int,
  `id_indicator` int
);

CREATE TABLE `submission` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_kelas` int,
  `id_assignment` int,
  `title` varchar(255),
  `description` varchar(255),
  `date_created` date,
  `user_update` int,
  `grade` varchar(255)
);

CREATE TABLE `subtema` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `id_tema` int
);

CREATE TABLE `teacher` (
  `nomor_pegawai` varchar(255) PRIMARY KEY,
  `username` varchar(255),
  `password` varchar(255),
  `nama` varchar(255)
);

CREATE TABLE `tema` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255)
);

CREATE TABLE `tema_indicator` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `description` varchar(255),
  `id_tema` int,
  `id_subtema` int
);

ALTER TABLE `assignment` ADD FOREIGN KEY (`user_update`) REFERENCES `users` (`id`);

ALTER TABLE `assignment` ADD FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`nomor_pegawai`);

ALTER TABLE `attendance` ADD FOREIGN KEY (`id_class`) REFERENCES `class` (`id`);

ALTER TABLE `bulletin` ADD FOREIGN KEY (`user_update`) REFERENCES `users` (`id`);

ALTER TABLE `child` ADD FOREIGN KEY (`id_kelas`) REFERENCES `class` (`id`);

ALTER TABLE `discussion` ADD FOREIGN KEY (`id_kelas`) REFERENCES `class` (`id`);

ALTER TABLE `discussion` ADD FOREIGN KEY (`id_assignment`) REFERENCES `assignment` (`id`);

ALTER TABLE `document` ADD FOREIGN KEY (`user_upload`) REFERENCES `users` (`id`);

ALTER TABLE `document` ADD FOREIGN KEY (`id_event`) REFERENCES `event` (`id`);

ALTER TABLE `document` ADD FOREIGN KEY (`id_submission`) REFERENCES `submission` (`id`);

ALTER TABLE `document` ADD FOREIGN KEY (`id_assignment`) REFERENCES `assignment` (`id`);

ALTER TABLE `document` ADD FOREIGN KEY (`id_bulletin`) REFERENCES `bulletin` (`id`);

ALTER TABLE `event` ADD FOREIGN KEY (`id_class`) REFERENCES `class` (`id`);

ALTER TABLE `file` ADD FOREIGN KEY (`user_upload`) REFERENCES `users` (`id`);

ALTER TABLE `file` ADD FOREIGN KEY (`id_folder`) REFERENCES `folder` (`id`);

ALTER TABLE `folder` ADD FOREIGN KEY (`user_create`) REFERENCES `users` (`id`);

ALTER TABLE `grade` ADD FOREIGN KEY (`id_indicator`) REFERENCES `indicator` (`id`);

ALTER TABLE `grade` ADD FOREIGN KEY (`id_submission`) REFERENCES `submission` (`id`);

ALTER TABLE `group_chat` ADD FOREIGN KEY (`id_class`) REFERENCES `class` (`id`);

ALTER TABLE `class_assignment` ADD FOREIGN KEY (`id_class`) REFERENCES `class` (`id`);

ALTER TABLE `class_assignment` ADD FOREIGN KEY (`id_assignment`) REFERENCES `assignment` (`id`);

ALTER TABLE `class_event` ADD FOREIGN KEY (`id_class`) REFERENCES `class` (`id`);

ALTER TABLE `class_event` ADD FOREIGN KEY (`id_event`) REFERENCES `event` (`id`);

ALTER TABLE `raport` ADD FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id`);

ALTER TABLE `raport` ADD FOREIGN KEY (`id_subtema`) REFERENCES `subtema` (`id`);

ALTER TABLE `raport` ADD FOREIGN KEY (`id_indicator`) REFERENCES `indicator` (`id`);

ALTER TABLE `submission` ADD FOREIGN KEY (`id_kelas`) REFERENCES `class` (`id`);

ALTER TABLE `submission` ADD FOREIGN KEY (`id_assignment`) REFERENCES `assignment` (`id`);

ALTER TABLE `submission` ADD FOREIGN KEY (`user_update`) REFERENCES `users` (`id`);

ALTER TABLE `subtema` ADD FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id`);

ALTER TABLE `tema_indicator` ADD FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id`);

ALTER TABLE `tema_indicator` ADD FOREIGN KEY (`id_subtema`) REFERENCES `subtema` (`id`);
