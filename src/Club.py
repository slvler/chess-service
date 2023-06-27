from src.Api import Api


class Club:
    base_uri = 'https://api.chess.com/pub/'

    def common(self, id):
        full_url = self.base_uri + 'club/' + id
        Api.get(full_url)

    def club_profile(self, id):
        full_url = self.base_uri + 'club/' + id
        Api.get(full_url)

    def community(self, detail):
        full_url = self.base_uri + 'club/' + detail
        Api.get(full_url)

    def club_members(self, id):
        full_url = self.base_uri + 'club/' + id + '/members'
        Api.get(full_url)

    def club_matches(self, id):
        full_url = self.base_uri + 'club/' + id + '/matches'
        Api.get(full_url)

