
-- drop database if exists loja_varejo;
create database if not exists loja_varejo;
use loja_varejo;
create table if not exists address(
	address_code int auto_increment,
    public_place varchar(30) not null,
    number_of_street varchar(10) not null,
    complement varchar(10) not null,
    neighborhood varchar(30) not null,
    city varchar(30) not null,
    zip_code char(8) not null,
    primary key(address_code)
);
create table if not exists provider(
	cnpj char(14),
    provider_name varchar(50) not null,
    phone varchar(15), 
    address_code int,
    primary key(cnpj),
	constraint address_code foreign key (address_code) references address(address_code)
);
create table if not exists product(
	product_code int auto_increment,
    product_name varchar(40) not null,
    price float not null,
    quantity int,
    primary key(product_code)
    );
create table if not exists provider_product(
	provider_cnpj char(14),
    product_code int,
    primary key(provider_cnpj, product_code),
    foreign key(provider_cnpj) references provider (cnpj),
    foreign key(product_code) references product (product_code)
);
    
insert into address(
	address_code,
    public_place,
    number_of_street,
    complement,
    neighborhood,
    city,
    zip_code
)values(
null,
'Avenida',
797,
"casa",
'Pedreira',
'Belém',
'66085317'
);
    
    