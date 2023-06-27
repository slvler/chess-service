from src.Api import Api


class TeamMatches:
    base_uri = 'https://api.chess.com/pub/'

    def daily_team_matches(self, id):
        full_url = self.base_uri + 'match/' + id
        Api.get(full_url)

    def daily_team_match_board(self, id, board):
        full_url = self.base_uri + 'match/' + id + '/' + board
        Api.get(full_url)

    def live_team_match(self, id):
        full_url = self.base_uri + 'match/live/' + id
        Api.get(full_url)

    def live_team_match_board(self, id, board):
        full_url = self.base_uri + 'match/live/' + id + '/' + board
        Api.get(full_url)