from src.Api import Api


class LeaderBoard:
    base_uri = 'https://api.chess.com/pub/leaderboards'

    def common(self):
        Api.get(self.base_uri)