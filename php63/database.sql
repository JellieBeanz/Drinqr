CREATE TABLE gallery (
  idGallery int(11) AUTO_INCREMENT PRIMARY KEY not null,
  titleGallery LONGTEXT not null,
  descGallery LONGTEXT not null,
  imgFullNameGallery LONGTEXT not null,
  orderGallery int(11) not null
);
