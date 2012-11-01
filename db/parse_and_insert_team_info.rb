File.open("team_data.txt") do |f|
        f.each_line do |line|
            fields = line.split(",")
            league = fields[0].strip
            team_name = fields[1].strip
            logourl = fields[2].strip
            puts "INSERT into team(name, league, logourl) VALUES(#{team_name}, '#{league}', '#{logourl}');"
        end
end