DROP DATABASE IF EXISTS `dddcqrs`;
CREATE DATABASE `dddcqrs` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE customers (
  id SERIAL PRIMARY KEY, 
  customername varchar (100) default null
);

CREATE TABLE orders 
( 
  id SERIAL primary key,
  description text default null,
  price varchar(256) default null,
  customer_id integer, 
  constraint fk_customer_id
     foreign key (customer_id) 
     REFERENCES customers (id)
);

INSERT INTO public.customers (customername)
	VALUES ('Customer 1');
INSERT INTO public.customers (customername)
	VALUES ('Customer 2');
INSERT INTO public.customers (customername)
	VALUES ('Customer 3');


select * from customers;
select * from orders;