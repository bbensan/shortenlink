export class CreateShortenLinkDto {
  title: string;
  original_url: string;
  shortened_url: string;
  userId?: string;
  status?: string;
}
