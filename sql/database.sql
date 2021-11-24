create table products
(
    id               serial primary key unique,
    product_id       integer                             ,
    product_name     varchar                             not null,
    product_price    real                                not null,
    product_article  varchar                             not null,
    product_quantity smallint  default 0,
    date_create      timestamp default CURRENT_TIMESTAMP not null);
