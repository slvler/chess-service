from src.Api import Api


class Country:
    base_uri = 'https://api.chess.com/pub/'

    def common(self, url):
        full_url = self.base_uri + 'country/' + url
        Api.get(full_url)

    def country_player(self, url, name):
        full_url = self.base_uri + 'country/' + url + '/' + name
        Api.get(full_url)

    def country_club(self, url):
        full_url = self.base_uri + 'country/' + url + '/clubs'
        Api.get(full_url)
