DROP TABLE IF EXISTS dbo.trades;

CREATE TABLE trades (
    symbol varchar(8),
    date_time datetime,
    entry_price float(24),
    exit_price float(24)
);