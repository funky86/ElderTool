USE tradeschool;

DROP TABLE IF EXISTS trades;

CREATE TABLE trades (
    symbol varchar(8),
    created_date datetime,
    entry_date datetime,
    entry_price float,
    exit_date datetime,
    exit_price float
);