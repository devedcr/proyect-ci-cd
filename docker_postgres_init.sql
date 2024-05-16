CREATE TABLE IF NOT EXISTS note(
    id serial primary key,
    name varchar(255),
    date_start date,
    date_end date    
);