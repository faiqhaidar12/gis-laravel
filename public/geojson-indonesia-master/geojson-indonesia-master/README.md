# geojson-indonesia
[![npm version](https://img.shields.io/badge/donate-PayPal-green.svg)](https://www.paypal.me/gtsatria)

High-res and simplified geojson of Indonesian administrative areas, based on data from [Wikipedia](https://en.wikipedia.org/wiki/Provinces_of_Indonesia#Table_of_provinces) and [OpenStreetMap](https://www.openstreetmap.org).

Please submit issue if you find error, any feedback higly appreciated 🙏

## Available Province
| Province | ISO | High-res | Simplified |
| ------ | -- | -- | -- |
| 1. East Java | ID-JI | [File](province/id-ji.geojson) | [File](province-simplified/id-ji.min.geojson) |
| 2. Special Capital Region of Jakarta | ID-JK | [File](province/id-jk.geojson) | [File](province-simplified/id-jk.min.geojson) |
| 3. Special Region of Yogyakarta | ID-YO | [File](province/id-yo.geojson) | [File](province-simplified/id-yo.min.geojson) |

## Available City/Regency
| City/Regency | High-res | Simplified |
| ------ | -- | -- |
| 1. South Jakarta | [File](city-regency/id-jk-jaksel.geojson) | [File](city-regency-simplified/id-jk-jaksel.min.geojson) |
| 2. East Jakarta | [File](city-regency/id-jk-jaktim.geojson) | [File](city-regency-simplified/id-jk-jaktim.min.geojson) |
| 3. Central Jakarta | [File](city-regency/id-jk-jakpus.geojson) | [File](city-regency-simplified/id-jk-jakpus.min.geojson) |
| 4. West Jakarta | [File](city-regency/id-jk-jakbar.geojson) | [File](city-regency-simplified/id-jk-jakbar.min.geojson) |
| 5. North Jakarta | [File](city-regency/id-jk-jakut.geojson) | [File](city-regency-simplified/id-jk-jakut.min.geojson) |
| 6. City of Yogyakarta | [File](city-regency/id-yo-yogyakarta.geojson) | [File](city-regency-simplified/id-yo-yogyakarta.min.geojson) |

## Version Logs
### 0.1
1. Add city & regencies in Yogyakarta
2. Add cities in Jakarta
3. Add cities and regencies in East Java (Kota Mojokerto isn't available in the map due to missing data from the source)
4. Add simplified version, generated via [mapshaper](https://mapshaper.org )
5. Add South Jakarta, East Jakarta, Central Jakarta, North Jakarta
6. Add City of Yogyakarta (Pakualaman currently not available)
