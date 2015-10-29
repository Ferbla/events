CREATE DATABASE IF NOT EXISTS events;

CREATE TABLE event(
  event_id INT auto_increment,
  event_name VARCHAR(50),
  event_date VARCHAR(50),

  PRIMARY KEY(event_id)
);

INSERT INTO event (event_name, event_date) VALUES ("Neat", "10/28/2015");
