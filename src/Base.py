from src.Player import Player
from src.Club import Club
from src.Tournaments import Tournaments
from src.TeamMatches import TeamMatches
from src.Country import Country
from src.LeaderBoard import LeaderBoard
from src.Streamer import Streamer
from src.DailyPuzzle import DailyPuzzle

class Base:

    @staticmethod
    def player():
        return Player()

    @staticmethod
    def club():
        return Club()

    @staticmethod
    def tournament():
        return Tournaments()

    @staticmethod
    def team_matches():
        return TeamMatches()

    @staticmethod
    def country():
        return Country()

    @staticmethod
    def leaderboard():
        return LeaderBoard()

    @staticmethod
    def streamer():
        return Streamer()

    @staticmethod
    def daily_puzzle():
        return DailyPuzzle()