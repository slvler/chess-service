from src.Api import Api


class Streamer:
    base_uri = 'https://api.chess.com/pub/streamers'

    def common(self):
        Api.get(self.base_uri)
