#setup schema
source setup_db.sql

#load actual data in
source populate_team_info.sql
source populate_games.sql