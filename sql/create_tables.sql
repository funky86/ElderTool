DROP TABLE IF EXISTS dbo.trades;

CREATE TABLE trades (
    symbol varchar(8),
    created_date datetime,
    entry_date datetime,
    entry_price float(24),
    exit_date datetime,
    exit_price float(24)
);