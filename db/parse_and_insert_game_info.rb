File.open("game_data.txt") do |f|
        f.each_line do |line|
            fields = line.split(",")
            league = fields[0]
            team_name = fields[1]
            #puts "INSERT into game(league, home_team) VALUES(#{team_name}, '#{league}')"
        end
end