from src.Api import Api


class Player:
    base_uri = 'https://api.chess.com/pub/'

    def common(self, url):
        full_url = self.base_uri + 'player/' + url
        Api.get(full_url)

    def title(self, url):
        full_url = self.base_uri + 'titled/' + url
        Api.get(full_url)

    def stats(self, player, variable):
        full_url = self.base_uri + 'player/' + player + '/' + variable
        Api.get(full_url)

    def archive(self, player, variable):
        full_url = self.base_uri + 'player/' + player + '/' + variable
        Api.get(full_url)

    def games(self, player, variable):
        full_url = self.base_uri + 'player/' + player + '/' + variable
        Api.get(full_url)

    def to_move(self, player):
        full_url = self.base_uri + 'player/' + player + '/games/to-move'
        Api.get(full_url)

    def games_archive(self, player):
        full_url = self.base_uri + 'player/' + player + '/games/archives'
        Api.get(full_url)

    def complete_monthly_archives(self, player, year, month):
        full_url = self.base_uri + 'player/' + player + '/games/' + year + '/' + month
        Api.get(full_url)

    def multi_game_pgn_download(self, player, year, month):
        full_url = self.base_uri + 'player/' + player + '/games/' + year + '/' + month + '/png'
        Api.get(full_url)

    def player_clubs(self, player):
        full_url = self.base_uri + 'player/' + player + '/clubs'
        Api.get(full_url)

    def player_matches(self, player):
        full_url = self.base_uri + 'player/' + player + '/matches'
        Api.get(full_url)

    def player_tournaments(self, player):
        full_url = self.base_uri + 'player/' + player + '/tournaments'
        Api.get(full_url)

