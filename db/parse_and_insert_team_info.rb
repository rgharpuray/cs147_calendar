File.open("team_data.txt") do |f|
        f.each_line do |line|
            fields = line.split(",")
            league = fields[0].strip
            team_name = fields[1].strip
            puts "INSERT into team(name, league) VALUES(#{team_name}, '#{league}');"
        end
end