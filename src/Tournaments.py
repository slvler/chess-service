from src.Api import Api


class Tournaments:
    base_uri = 'https://api.chess.com/pub/'

    def common(self, id):
        full_url = self.base_uri + 'tournament/' + id
        Api.get(full_url)

    def tournaments_round(self, id, round):
        full_url = self.base_uri + 'tournament/' + id + '/' + round
        Api.get(full_url)

    def tournaments_round_group(self, id, round, group):
        full_url = self.base_uri + 'tournament/' + id + '/' + round + '/' + group
        Api.get(full_url)


