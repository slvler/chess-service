from src.Api import Api


class DailyPuzzle:
    base_uri = 'https://api.chess.com/pub/'

    def common(self):
        full_url = self.base_uri + 'puzzle/'
        Api.get(full_url)

    def random(self):
        full_url = self.base_uri + 'puzzle/random'
        Api.get(full_url)
